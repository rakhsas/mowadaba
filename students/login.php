<?php
require_once('../include/login_header.php');
?>
<?php

    require_once('../include/dbcon.php');

    if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = htmlentities(mysqli_real_escape_string($con,$email));
    $password = htmlentities(mysqli_real_escape_string($con,$password));

    $query = "SELECT * FROM `students` WHERE `email` like '%$email%' and `password` like '%$password%' ";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row == 0)
    {
        $_SESSION['login_failed'] = "Username Or Password Wrong";
        $login_failed = $_SESSION['login_failed'];
    }
    else{
        $data = mysqli_fetch_assoc($run);
        $student_name = $data['name'];
        $student_id = $data['id'];
        $_SESSION['student_name'] = $student_name;
        $_SESSION['student_id'] = $student_id;
        header("location:index");
    }
}
?>
<?php
if(isset($_SESSION['student_id']))
{
header("location:index");
}
else{
  
}

?>
  <body style="background: url() center top repeat-x #fff; background-size: cover;">
  <nav class="darken-4" style="background-color:#526Fd7;"">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down"  href="../index"><img src="../images/whitelogo.svg" width="30" height="25"> Mowadaba </a>
        <ul class="right">
            <li class="waves-effect waves-light"><a href="../loginadmin">Administration</a></li>
            <li class="waves-effect waves-light"><a href="../loginprof">Professeur</a></li>
            <li class="waves-effect waves-light" style="background: rgba(2, 57, 183, 0.8)"><a href="">Élève</a></li>
        </ul>
    </div>
</nav>
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                        <div class="card-content">
                            <h5 class="<?php if(isset($login_failed)) { echo "hide";} ?>">Espace Élève !</h5>
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
                                <input type="text" name="email" id="email" value="" required="required" style="">
                                <label for="email" style="background-color="#FF8000">Addresse Mail</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    lock
                                </i>                    
                                <input type="password" name="password" value="" id="password" required="required">
                                <label for="password">Mot de Passe</label>
                            </div>
                            <br>
                            <div>
                                <button type="submit" name="login" class="btn" style="width: 100%; border-radius: 15px;background-color:#FF8000;">Se Connecter</button>
                            </div>
                            <div class="input-field">
            <a href="mdpo" class="center" style="margin: 0px;margin-top:2px; display: block;color:black;text-decoration: underline;">Mot de Passe Oublié</a>
                            </div>
                        </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
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