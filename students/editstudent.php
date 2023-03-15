
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
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        
        
        require_once('../include/dbcon.php');
        $student_id = $_GET['id'];
        $st = (($student_id*956783)/4);
        if(isset($st)){
        }
        else
        {
          header("location:dashboard.php");
        }
        $query = "SELECT * FROM students WHERE `id`='$st'";

        $run = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($run);
        $image = $data['image'];
        $fstname = $data['fstname'];
        $lstname = $data['lstname'];
        $Numero_de_Parent = $data['Numero de Parent'];
        $standerd = $data['standerd'];
        $gender = $data['gender'];
        $date  = $data['DateNaissance'];
        $contact = $data['contact'];
        $email = $data['email'];
        $quartier = $data['adresse'];

        if(isset($_POST['submit'])){
            $image_name = $_FILES['image']['name'];
            $temp_image_name =  $_FILES['image']['tmp_name'];
            $Numero_de_Parent = htmlentities(mysqli_real_escape_string($con,$_POST['Numero_de_Parent']));
            $fstname= htmlentities(mysqli_real_escape_string($con,$_POST['fstname']));
            $lstname= htmlentities(mysqli_real_escape_string($con,$_POST['lstname']));
            $gender= htmlentities(mysqli_real_escape_string($con,$_POST['gender']));
            $contact = htmlentities(mysqli_real_escape_string($con,$_POST['contact']));
            $datenaissance = htmlentities(mysqli_real_escape_string($con,$_POST['date']));
            $email =  htmlentities(mysqli_real_escape_string($con,$_POST['email']));
            $pd = htmlentities(mysqli_real_escape_string($con,$_POST['password']));
            $Address = htmlentities(mysqli_real_escape_string($con,$_POST['Address']));
            move_uploaded_file($temp_image_name,"../img/$image_name");
            mysqli_query($con,"SET NAMES 'utf8'");
            //echo "<script>alert('".$image_name."')</script>";
            if(empty($_FILES['image']['name'])){
                $query = "UPDATE `students` SET `lstname`='$lstname' ,`fstname`='$fstname',`DateNaissance`='$datenaissance',`contact`='$contact',`email`='$email',`adresse`='$Address',`gender`= '$gender',`Numero de Parent`='$Numero_de_Parent' WHERE `id`='$st' ";
                $run = mysqli_query($con,$query);

                if($run){
                    $_SESSION['teacher_updated'] = "Teacher Updated Successfully";
                    $teacher_updated =  $_SESSION['teacher_updated'];
                }else{
                    $_SESSION['teacher_updated_failed'] = "Failed To Update";
                    $teacher_updated_failed =  $_SESSION['teacher_updated_failed'];
                }
            }else{
                $query = "UPDATE `students` SET `lstname`='$lstname' ,`fstname`='$fstname',`DateNaissance`='$datenaissance',`contact`='$contact',`email`='$email',`adresse`='$Address',`gender`= '$gender',`Numero de Parent`='$Numero_de_Parent',`image`='$image_name' WHERE `id`='$st' ";
                $run = mysqli_query($con,$query);
                if($run){
                    $_SESSION['teacher_updated'] = "Teacher Updated Successfully";
                    $teacher_updated =  $_SESSION['teacher_updated'];
                }else{
                    $_SESSION['teacher_updated_failed'] = "Failed To Update";
                    $teacher_updated_failed =  $_SESSION['teacher_updated_failed'];
                }
            }
            header("Refresh:3");
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
              <form action="" method="POST" enctype="multipart/form-data">
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
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                                <input type="file" id="input-file-now-custom-1" name="image" class="dropify" data-default-file="../img/<?php if (isset($image) && !empty($image)){echo $image;}else{echo "teacher.png";}?>" />
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <div class="row">
                        <div class="col l5 center">
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" value="<?php echo $fstname; ?>" name="fstname" id="fstname" required="required">
                                <label for="fstname">Prenom</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" value="<?php echo $lstname; ?>" name="lstname" id="lstname" required="required">
                                <label for="fstname">Nom</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">cake</i>
                                <input type="text" value="<?php echo $date; ?>" name="date" id="date" required="required">
                                <label for="date">Naissance</label>
                            </div>
                            <!--<div class="input-field">
                                <i class="material-icons prefix">call</i>
                                <input type="text" value="<?php echo $Numero_de_Parent; ?>" name="Numero_de_Parent" id="Numero_de_Parent" required="required">
                                <label for="Numero_de_Parent">Numero de Parent</label>
                            </div>-->
                        </div>
                        <div class="col s2 center"></div>
                        <div class="col l5 center">
                            <div class="input-field">
                                <select name="standerd" disabled>
                                    <option value="" class="disabled">Choisir une option </option>
                                    <?php $rst = mysqli_query($con,"SELECT DISTINCT(nom) from classes");
                                    $ss = mysqli_query($con,"SELECT `standerd` FROM `students` where `id`='$st'");
                                    $a = mysqli_fetch_assoc($ss);
                                    //echo "<script>alert('".$idb."')</script>";
                                    $i = 1;
                                    while($slt = mysqli_fetch_assoc($rst)){
                                        if($slt['nom'] == $a['standerd']){?>
                                            <option value="" selected><?php echo $a['standerd']; ?></option><?php
                                        }else{?>
                                        <option value="" ><?php echo $slt['standerd']; ?></option> 
                                    <?php }$i++;
                                     } ?>
                                </select>
                            </div>
                            <!--<div class="input-field">
                                <i class="material-icons prefix">call</i>
                                <input type="text" value="<?php echo $contact; ?>" name="contact" id="contact" required="required">
                                <label for="contact">Numero de telephone</label>
                            </div>-->
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input id="email" value="<?php echo $email; ?>" name="email" type="email" class="validate" required="required">
                                <label for="email" data-error="wrong" data-success="right">Adresse mail</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">add_location</i>
                                <input type="text" value="<?php echo $quartier; ?>" name="Address" id="Address" required="required">
                                <label for="Address">Addresse</label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col l6 center">
                                <div class="center">
                                    <label>
                                        <input type="radio" <?php if($gender=="Femme"){echo "checked";} ?> name="gender" id="gender" value="Femme"  class="with-gap" />
                                        <span>Femme</span>
                                    </label>
                                    <label>
                                        <input type="radio" <?php if($gender=="Homme"){echo "checked";} ?> name="gender" id="gender" value="Homme" class="with-gap" />
                                        <span>Homme</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div><div class="center">
                        <button type="submit" name="submit" style="width:auto" class="btn">Modifier</button></div>
                    </div>
              </form>

            </div>
        </div>

        <?php
require_once('../include/students/sidenavstudent.php');
?>
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
        <script src="dist/js/dropify.min.js"></script>
        <script>
            $(document).ready(function(){
                // Basic
                $('select').formSelect();
                $('.sidenav').sidenav();
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
            });
            $(document).ready(function(){
                
            });
        </script>
    </body>
</html>
