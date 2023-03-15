
<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once('../include/students/hh.php');
session_start();
?>
<?php

    require_once('../include/dbcon.php');

    if(isset($_POST['login'])){
        
    $email = $_POST['email'];
    //$password = $_POST['password'];

    $email = htmlentities(mysqli_real_escape_string($con,$email));
    //$password = htmlentities(mysqli_real_escape_string($con,$password));

    $query = "select * FROM students where email='$email' limit 1";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    $rsr = mysqli_fetch_assoc($run);
    $token = $rsr['token'];
    
    if($row < 1)
    {
        $_SESSION['Email Inexist'] = "C'est email n'exist pas";
        $inexist = $_SESSION['Email Inexist'];
    }
    else{
        //$_SESSION['token'] = $token;
        
        
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        $body = '<html><head><meta charset="ISO-8859-1"><meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1"></head><body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">';
        
        $body .= '<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" >';
        $body .= "<tr><td>";
        $body .= '<table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
        $body .= '<tr><td style="height:80px;">&nbsp;</td></tr><tr><td style="text-align:center;"><a href="http://p-tech-school.epizy.com/" title="logo" target="_blank"><img width="100" src="https://i.imgur.com/hh6MVky.png" title="logo" alt="logo"></a></td></tr>';
        $body .= '<tr><td style="height:20px;">&nbsp;</td></tr><tr><td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);"><tr><td style="height:40px;">&nbsp;</td></tr><tr>';
        $body .= '<td style="padding:0 35px;">';
        $body .= '<h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;">';
        $body .= utf8_decode('Vous avez demandé la réinitialisation de votre mot de passe');
        $body .= '</h1>';
        $body .= '<span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>';
        $body .= '<p style="color:#455056; font-size:15px;line-height:24px; margin:0;">';
        $body .=  utf8_decode('Nous ne pouvons pas simplement vous envoyer votre ancien mot de passe. Un lien unique pour réinitialiser votre mot de passe a été généré pour vous. Pour réinitialiser votre mot de passe, cliquez sur le lien suivant et suivez les instructions.');
        $body .= '</p> ';
        $body .= '<a href="http://p-tech-school.epizy.com/students/cpsw?token=';
        $body .= $token;
        $body .= '" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">';
        $body .= utf8_decode('Réinitialiser').'</a>';
        $body .= '</td></tr><tr><td style="height:40px;">&nbsp;</td></tr></table></td><tr><td style="height:20px;">&nbsp;</td></tr><tr><td style="text-align:center;"><p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>https://www.ptech.org/p-tech-network/our-schools/mar/#644</strong></p>';
        $body .= '</td></tr><tr><td style="height:80px;">&nbsp;</td></tr></table></td></tr></table></body></html>';

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        //aboudtaztoz@gmail.com
        // slhhqrkhjumvppyw
        $mail->Username = "ibnghazala.ptech@gmail.com"; //enter you email address
        $mail->Password = 'dtnumtusmsqglnap'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        //db hanta db bach kantester wach makaynch chi error ola chi hja 
        $mail->isHTML(true);
        $mail->setFrom("ibnghazala.ptech@gmail.com", "noreply:IbnGhazala@P-tech.com");
        $mail->addAddress("$email"); //enter you email address
        $mail->Subject = (utf8_decode('Récupération de Mot de Passe'));

        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Un email de confirmation  à été envoyé à votre boîte mail";
        } else {
            $status = "failed";
            $response = "Une erreur est survenue: <br><br>" . $mail->ErrorInfo;
        }
        $_SESSION['exist'] = $response;
        $exist = $_SESSION['exist'];
          //exit();
    }
}
if(isset($_SESSION['student_id']))
{
header("location:index.php");
}
else{ 
}
?>
        <script src="https://smtpjs.com/v3/smtp.js"></script>
  <body style="background-image:url(../images/sms_bg.jpg); background-size: cover;">
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                        <div class="card-content">
                            <h5 class="<?php  ?>" >Login Form</h5>
                        </div>
                        <span class="card-title container">
                            <h5 class="center red-text"><?php if(isset($inexist)){echo $inexist;}else{echo $exist ;}?> </h5>
                        </span>
                        <div class="input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text" name="email" id="email" value="" required="required">
                            <label for="email">Addresse Mail</label>
                        </div>
                        <div>
                            <button type="submit" name="login" class="btn" style="width: 100%; border-radius: 15px;">Vérifier</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>

<?php


?>
