
<?php
require_once('../include/header.php');

require_once('../include/dbcon.php');
$id = $_SESSION['uid'];
$ecole = $_SESSION['ecole'];

    if(isset($_POST['submit'])){
        $rollno = $_POST['CN']; $standerd= $_POST['standerd']; $fstname= $_POST['fstname']; $lstname= $_POST['lstname']; $contact = $_POST['contact'];
        $datenaissance = $_POST['date']; $email =  $_POST['email']; $Address = $_POST['Address']; $id =   $_POST['id'];
        $query = "UPDATE `students` SET `standerd`='$standerd', `fstname`='$fstname',`lstname`='$lstname',`adresse`='$Address', `contact`='$contact',`DateNaissance`='$datenaissance', `email`='$email' WHERE `id`='$id'; ";
        $run = mysqli_query($con,$query);
        if($run){
           $_SESSION['student_updated'] = "Student Updated Successfully";
           $student_updated =  $_SESSION['student_updated'];
        }else{
           $_SESSION['student_updated_failed'] = "Failed To Update";
           $student_updated_failed =  $_SESSION['student_updated_failed'];
        }
    }
?>
      <!-- The Coding Has Been Started From Here -->
        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <!--<a href="" class="brand-logo left hide-on-med-and-down" style="margin-left: 115px;display: table;"><h6></h6></a>-->
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Modifier Éleve</a>
                    <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down" style="margin-left: 30px;">
                        <li><a href=""><?php echo $ecole; ?></a></li>
                    </ul>
                </div>        
            </div>
        </nav>
      

      <!-- The Dashboard Coding Started From Here -->

        <div class="row main">
            <div class="col l12 m12 s12">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-panel">
                        <div class="center">
                            <h5 class="center red-text"><?php
                                if(isset($student_updated)){
                                    echo $student_updated;
                                }
                                elseif(isset($student_updated_failed)){
                                    echo $student_updated_failed."<br>".mysqli_error($con);
                                }
                            ?> </h5>
                        </div>
                        <div class="row">
                            <div class ="center">
                                <div class="col l4"></div>
                                <div class="col l5">
                                    <div class="input-field">
                                        <i class="material-icons prefix">perm_identity</i>
                                        <input type="text" value="<?php echo $rollno; ?>" name="CNE" id="CNE">
                                        <label for="CNE" class="active">CNE</label>
                                    </div>
                                    <div class ="">
                                        <button type="submit" name="check" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">chercher</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['check'])){
                                $cne = $_POST['CNE'];
                                $query = "SELECT * FROM students WHERE `rollno`='$cne';";
                                $run = mysqli_query($con, $query);
                                if(mysqli_num_rows($run) > 0){
                                    
                                   $data = mysqli_fetch_assoc($run);
                                   $c = $data['rollno'];
                                //$image = $data['image'];
                                $id= $data['id'];
                                $fstname = $data['fstname'];
                                $lstname = $data['lstname'];
                                $standerd = $data['standerd'];
                                $gender = $data['gender'];
                                $city  = $data['Lieu de Naissance'];
                                $contact = $data['contact'];
                                $email = $data['email'];
                                $datenaissance = $data['DateNaissance'];
                                $Address = $data['Address'];?>

                                <div class="row">
                                    <div class="col l6" >
                                        <input type="hidden" value="<?php echo $id; ?>" id="id" name="id">
                                        <div class="input-field">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input type="text" value="<?php echo $c; ?>" name="CN" id="CN" class="validate" >
                                            <label for="CN" class="active">CNE</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">person</i>
                                                <input type="text" value="<?php echo $fstname; ?>" name="fstname" id="fstname" class="validate" >
                                                <label for="fstname">Prenom</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">person</i>
                                               <input type="text" value="<?php echo $lstname; ?>" name="lstname" id="lstname" class="validate">
                                                <label for="lstname">Nom</label>
                                        </div>
                                            <div class="input-field">
                                                <i class="material-icons prefix">call</i>
                                                <input type="text" value="<?php echo $contact; ?>" name="contact" id="contact" class="validate">
                                                <label for="contact">Numero de telephone</label>
                                            </div>
                                            
                                        </div>
                                            <div class="col l6 center">
                                                <div class="input-field">
                                                    <select name="standerd">
                                                        <option value="" class="disabled">Choisir une option </option>
                                                        <?php $rst = mysqli_query($con,"SELECT DISTINCT(standerd) from students");
                                                        while($slt = mysqli_fetch_assoc($rst)){?>
                                                            <option value="<?php echo $slt['standerd']; ?>" ><?php echo $slt['standerd']; ?></option> 
                                                            
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="input-field">
                                                    <i class="material-icons prefix">location_city</i>
                                                    <input type="text" value="<?php echo $city; ?>" name="city" id="city" class="validate">
                                                    <label for="city">Ville</label>
                                                </div>
                                                <div class="input-field">
                                                    <i class="material-icons prefix">email</i>
                                                    <input type="text" value="<?php echo $email; ?>" name="email" id="email" class="validate" >
                                                    <label for="email">Adresse mail</label>
                                                </div>
                                                <div class="input-field">
                                                    <i class="material-icons prefix">cake</i>
                                                    <input type="text" value="<?php echo $datenaissance; ?>" name="date" id="date" class="validate">
                                                    <label for="date">Naissance</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="center">
                                        <button type="submit" name="submit" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">Mise a jour</button>
                                    </div>
                                </div>
                                <?php }else{
                                    echo "<script>alert('INVALIDE CNE!!')</script>";
                                }
                                
                            }


                        ?>
                        
                    </div>
                    <!--<div class="col l4 m12 s12 center">
                        <div class="input-field file-field">
                        <input type="file" name="image" class="dropify" data-show-remove="false" value="<?php echo $image; ?>" data-default-file="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" />
                     </div>
                      </div>-->
                    
              </form>

            </div>
        </div>

      <!-- The Navbar Menu Collection List -->

      <?php
require_once('../include/sidenavadmin.php');
?>


      <?php
require_once('../include/footer.php');
?>