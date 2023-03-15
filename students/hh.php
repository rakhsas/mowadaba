
<?php session_start();
if(isset($_SESSION['student_id']))
{

}
else{
  header("location:login");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="description" content="">
        <meta charset="utf-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!--<meta name="format-detection" content="telephone=no">-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
        <link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/hh6MVky.png" />
        <!--<link rel="stylesheet" href="dist/css/demo.css">-->
        <link rel="stylesheet" href="dist/css/dropify.min.css">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
        <title><?php echo "Welcome " . $_SESSION['student_name']; ?></title>
        
        <style>
        header, .main, footer {
          padding-left: 300px;
        }
    
        @media only screen and (max-width : 992px) {
          header, .main, footer {
            padding-left: 0;
          }
        }
    </style>
    </head>
    <body>
    <?php
        $token = $_GET['token'];
        
        if(isset($token)){
            //echo "<script>alert()</script>";
        }
        else
        {
          header("location:dashboard.php");
        }
        require_once('../include/dbcon.php');
        

        if(isset($_POST['submit'])){

            echo "<script>alert()</script>";
            $pd = htmlentities(mysqli_real_escape_string($con,$_POST['password']));
            
            $query = "select * from students where `password`='$pd'";
            $r = mysqli_query($con,$query);
            
            if(mysqli_num_rows($r) > 0){
                $npd = htmlentities(mysqli_real_escape_string($con,$_POST['npassword']));
                $cnpd = htmlentities(mysqli_real_escape_string($con,$_POST['cnpassword']));
                if($npd == $cnpd){
                    $query1 = "UPDATE `students` SET `password`='$npd',`token`= md5('$cnpd') where `token`='".$token."'";
                    $run = mysqli_query($con,$query1);
                }
                if($run){
                    $_SESSION['teacher_updated'] = "Modification Enregistré";
                    $teacher_updated =  $_SESSION['teacher_updated'];
                }else{
                    $_SESSION['teacher_updated_failed'] = "Modification n'est pas Enregistré";
                    $teacher_updated_failed =  $_SESSION['teacher_updated_failed'];
                }
            }else{
                echo "<script>alert('hello')</script>";
            }
            
            

                
            
        }
    ?>
        
        <nav class="teal">
            <div class="container">
            <div class="nav-wrapper">
                <a href="" class="brand-logo center">Modifier</a>
                <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
            </div>
            </div>
        </nav>
        
        <div class="row main">
            <div class="col l12 m12 s12">
              <form action="" method="POST" id="change" enctype="multipart/form-data">
                <div class="card-panel">
                <div class="center">
                <?php if(isset($teacher_updated)){?>
                <h5 class="center" style="color:#4BB543"><?php echo $teacher_updated; 
              }?>
              <?php if(isset($teacher_updated_failed)){?>
                <h5 class="center red-text"><?php echo $teacher_updated_failed; 
              }?>
              

            </h5></div>
                    
                    <div class="row">
                            <div class="col l3"></div>
                            <div class="col l6">
                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>                    
                                    <input type="password" name="password" value="" id="password" >
                                    <label for="password">Mot de Passe Actuel</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">lock_outline</i>                    
                                    <input type="password" name="npassword" value="" id="npassword" >
                                    <label for="npassword">Nouveau</label>
                                    <small></small>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">lock_outline</i>                    
                                    <input type="password" name="cnpassword" value="" id="cnpassword" >
                                    <label for="cnpassword">Confirmer</label>
                                    <small></small>
                                </div>
                                <div class="col l3"></div>
                        </div>
                            
                        
                    </div>
                    
                </div>
                <div class="center">
                        <button type="submit" name="submit" id="submit" style="width:auto" class="btn">Modifier</button></div>
                    </div>
              </form>

            </div>
        </div>

        <?php
require_once('../include/students/sidenavstudent.php');
?>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <script>
      $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown();
    $('.tabs').tabs();
    $('.collapsible').collapsible();
    $('.tooltipped').tooltip();
  });
    </script>
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script src="dist/js/dropify.min.js"></script><!---->
        <script>/*
            $(document).ready(function(){
                // Basic
                $('select').formSelect();
                
                $('.collapsible').collapsible();
                $('.tooltipped').tooltip({delay: 50});
                $('.dropdown-trigger').dropdown();
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });*/
            
            
            const passwordEl = document.querySelector('#npassword');
            const confirmPasswordEl = document.querySelector('#cnpassword');
            //const but = document.getElementsByName('submit');
            const form = document.querySelector('#change');
            

            const checkPassword = () => {
                let valid = false;


                const password = passwordEl.value.trim();

                if (!isRequired(password)) {
                    showError(passwordEl, 'Password cannot be blank.');
                } else if (!isPasswordSecure(password)) {
                    showError(passwordEl, 'Password must has at least 12 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
                    //but.disabled = true;
                } else {
                    showSuccess(passwordEl);
                    valid = true;
                    //but.disabled = false;
                }
                return valid;
                
                /*if (valid) {
                    //form.addEventListener('click', enableButton);
                    but.disabled = false;
                }else{
                    //form.addEventListener('click', disableButton);
                    but.disableButton=true;
                }*/
            };

            const checkConfirmPassword = () => {
                let valid = false;
                // check confirm password
                const confirmPassword = confirmPasswordEl.value.trim();
                const password = passwordEl.value.trim();

                if (!isRequired(confirmPassword)) {
                    showError(confirmPasswordEl, 'Please enter the password again');
                } else if (password !== confirmPassword) {
                    showError(confirmPasswordEl, 'The password does not match');
                } else {
                    showSuccess(confirmPasswordEl);
                    valid = true;
                }

                return valid;
            };


            const isPasswordSecure = (password) => {
                const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{12,})");
                return re.test(password);
            };

            const isRequired = value => value === '' ? false : true;
            const isBetween = (length, min, max) => length < min || length > max ? false : true;


            const showError = (input, message) => {
                // get the form-field element
                const formField = input.parentElement;
                // add the error class
                formField.classList.remove('success');
                formField.classList.add('error');

                // show the error message
                const error = formField.querySelector('small');
                error.textContent = message;
            };

            const showSuccess = (input) => {
                // get the form-field element
                const formField = input.parentElement;

                // remove the error class
                formField.classList.remove('error');
                formField.classList.add('success');

                // hide the error message
                const error = formField.querySelector('small');
                error.textContent = '';
            }


            /*form.addEventListener('submit', function (e) {
                // prevent the form from submitting
                e.preventDefault();

                // validate fields
                let 
                    isPasswordValid = checkPassword(),
                    isConfirmPasswordValid = checkConfirmPassword();

                let isFormValid = 
                    isPasswordValid &&
                    isConfirmPasswordValid;
                    //const button = document.querySelector('#submit');
                    //const disableButton = () => {
                        //button.disabled = true;
                    //};
                    //const enableButton = () => {
                        //button.disabled = false;
                    //};
                // submit to the server if the form is valid

                

                
            });*/


            const debounce = (fn, delay = 100) => {
                let timeoutId;
                return (...args) => {
                    // cancel the previous timer
                    if (timeoutId) {
                        clearTimeout(timeoutId);
                    }
                    // setup a new timer
                    timeoutId = setTimeout(() => {
                        fn.apply(null, args)
                    }, delay);
                };
                
            };

            form.addEventListener('input', debounce(function (e) {
                switch (e.target.id) {
                    
                    case 'npassword':
                        checkPassword();
                        break;
                    case 'cnpassword':
                        checkConfirmPassword();
                        break;
                }
            }));

        </script>
    </body>
</html>
