<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once('include/login_header.php');    
require_once('include/dbcon.php');
    function password_generate($chars) 
    {
      //$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
      $data = '1234567890abcefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($data), 0, $chars);
    }
?>
<?php


    if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $nom = trim($_POST['nom']);
    $pass=password_generate(7);
    $sql="SELECT * FROM `teacher` WHERE email='$email'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) == 0){
    //$email = htmlentities(mysqli_real_escape_string($con,$email));
    //$nom = htmlentities(mysqli_real_escape_string($con,$nom));

    $query = "INSERT INTO `teacher` (`id`, `name`, `email`, `contact`, `gender`, `password`, `address`, `image`, `Matricule`, `idMatier`) VALUES (NULL, '$nom','$email', '', '', '$pass', '', '', '', '')";
    if(mysqli_query($con,$query))
    {
      //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug = 0;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.mowadaba.ma';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contact@mowadaba.ma';                     //SMTP username
    $mail->Password   = 'Maroc_123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contact@mowadaba.ma', 'Mailer');
    $mail->addAddress('fadili101@gmail.com', 'Joe User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    // HTML body
    $body  = "Bonjour <font size=\"4\">" . $nom . "</font>, <p>";
    $body .= "<i>Veuillez</i> trouver ci-dessous, votre mot de passe:<p>";
     $body .= "Nom d'utilisateur: ".$email."<br>";
     $body .="Mot de passe: ".$pass."<p>";
     $body .="<b>NB :</b>Ce courriel a été généré automatiquement. Veuillez ne pas répondre à cette adresse électronique, car les réponses parviennent à une boite aux lettres non consultée, donc vous ne recevrez pas de réponse.<p>";
    $body .= "Cordialement, <p>";
    $body .= "L'équipe Mowadaba.ma";

    // Plain text body (for mail clients that cannot read HTML)
    $text_body  = "Bonjour" . $nom . ", \n\n";
    $text_body .= "Veuillez trouver ci-dessous, votre nouveau mot de passe:\n\n";
    $text_body .= "Nom d'utilisateur: ".$email."\n\n";
    $text_body .= "Mot de passe: ".$pass."\n\n";
    $text_body .= "Cordialement, \n";
    $text_body .= "L'équipe Mowadaba.ma";

    $mail->Body    = $body;
    $mail->AltBody = $text_body;
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Compte mowadaba';
   /* $mail->Body    = 'Bonjour '.$nomThis.'</br>'.'Veuillez trouver ci-dessous, votre nouveau mot de passe:'.'</br>Nom d\'utilisateur: '.$email.'</br>Mot de passe: '.$pass.'</br>Ce courriel a été généré automatiquement. Veuillez ne pas répondre à cette adresse électronique, car les réponses parviennent à une boite aux lettres non consultée, donc vous ne recevrez pas de réponse.</br>Cordialement</br>L\'équipe Mowadaba.ma';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
*/
    $mail->send();
    $_SESSION['login_failed'] = "Inscription réussie, en attente d'activation";
        $login_failed = $_SESSION['login_failed'];
        //header("location:inscription.php");
   // echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        
    }





}else{
    $_SESSION['login_failed'] = "Vous etes deja inscrit";
        $login_failed = $_SESSION['login_failed']; 
}
}
?>



  <body style="background: url() center top repeat-x #fff; background-size: cover;">
  <nav class="darken-4" style="background-color:#526Fd7;">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="index"><img src="images/whitelogo.svg" width="30" height="25"> Mowadaba</a>
        <ul class="right">
            <li class="waves-effect waves-light"><a href="loginadmin">Administration</a></li>
            <li class="waves-effect waves-light" style="background: rgba(2, 57, 183, 0.8)"><a href="loginprof">Professeur</a></li>
            <li class="waves-effect waves-light"><a href="students">Élève</a></li>
        </ul>
    </div>
</nav>
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                <h5 class="<?php if(isset($login_failed)) { echo "hide";} ?>" >Espace Professeur !</h5>
                            </div>
                                                            <span class="card-title container">
              <h5 class="center red-text"><?php 
              
                if(isset($login_failed)){
                  echo $login_failed; 
                }
                

              ?> </h5>
            </span>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    person
                                </i>
                                <input type="text" name="nom" value="" id="nom" required="required">
                                <label for="nom">Nom et prenom</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    person
                                </i>
                                <input type="text" name="email" value="" id="email" required="required">
                                <label for="email">Addresse Mail</label>
                            </div>
                           
                        <br>
                            <div>
                            <button type="submit" name="login" class="btn" style="width: 100%; border-radius: 15px; background-color:#FF8000;">S'inscrire</button>
                            
                        </div>
                        <div>
                            <a href="loginprof.php" class="btn" style="margin-top:20px;width: 100%; border-radius: 15px; background-color:#DCDCD;">Se connecter</a>
                        </div>
                        </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<style>
    .pull-right {
            float: left !important;
        }

        .pull-left {
            float: right !important;
        }
        .accueil-footer {
            position: fixed;
            bottom: 0px;
            left: 18%;
            width: 60%;
            background: #fff;
            border-top: 1px solid #d2d6de;
            padding: 12px;
        }
</style>
<footer>
    <div class="accueil-footer">
        <div class="pull-right">
            <b>Version</b> 2.0
        </div>
        <div class="pull-left">
            <strong>Copyright © <?php echo date("Y"); ?></strong>
        </div>
        
    </div>
</footer>
</html>