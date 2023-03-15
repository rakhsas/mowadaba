<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
    <link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/hh6MVky.png" />
        <title>Changer Mot de pass</title>
        <?php

            require_once('../include/dbcon.php');
            
            session_start();
            if(isset($_GET['token']))
            {
                $token = $_GET['token'];
                echo '<script>alert('.$token.');</script>';
            }
            else{
                echo"Une erreur est survenue";
                header("location:index.php");
            }
        ?>
    </head>
  <body style="background-image:url(../images/sms_bg.jpg); background-size: cover;">
    <nav class="darken-4" style="background-color:teal;">
        <div class="container">
            <a class="brand-logo hide-on-med-and-down" href="">Gestion d'école</a>
            <ul class="right">
                <li class="waves-effect waves-light"><a href="../loginadmin">Administration</a></li>
                <li class="waves-effect waves-light"><a href="../loginprof">Professeurs</a></li>
                <li class="waves-effect waves-light"><a href="login">Étudiant</a></li>
            </ul>
        </div>
    </nav>
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                        <span class="card-title container">
                            <h5 class="center red-text"><?php if(isset($inexist)){echo $inexist;}else{echo $exist ;}?> </h5>
                        </span>
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" name="psw" id="psw" value="" required="required">
                            <label for="psw">Mot de Passe</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" name="cpsw" id="cpsw" value="" required="required">
                            <label for="cpsw">Confirmer Mot de Passe</label>
                        </div>
                        <div>
                            <button type="submit" name="Changer" class="btn" style="width: 100%; border-radius: 15px;">Changer Mot de Passe</button>
                            <?php
                                if(isset($_POST['Changer'])){
                                    $psd = $_POST['psw'];
                                    $cpsd = $_POST['cpsw'];
                                    if($psd == $cpsd){
                                        $query = "UPDATE `students` SET `password`='$psd',`token`= md5('$psd') where `token`='".$token."'";
                                        $run = mysqli_query($con,$query);
                                        
header("location:index.php");
                                    }
                                    else
                                    {
                                        $_SESSION['password_not_changed'] = "Mot de passes pas identiques";
                                        $inexist = $_SESSION['password_not_changed'];
                                    }
                                }                                    
                            ?>
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