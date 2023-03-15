<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
$ecole = $_SESSION['ecole'];

    if(isset($_POST['submit'])){
        //$image_name = $_FILES['image']['name'];
        //$temp_image_name =  $_FILES['image']['tmp_name'];
        $name = $_POST['name'];
        $email= $_POST['email'];
        $contact= $_POST['contact'];
        $gender= $_POST['gender'];
        $matiere = $_POST['matiere'];
        $address = $_POST['address'];
        
        $m = $_POST['Matricule'];
        
        $ida = $_POST['id'];
        //move_uploaded_file($temp_image_name,"../img/$image_name");
   $query = "UPDATE `teacher` SET `name`='$name', `email`='$email', `contact`='$contact', `gender`='$gender', `idMatier`='$matiere', `address`='$address', `Matricule`='$m' WHERE `id`=$ida ";
    $run = mysqli_query($con,$query);

    if($run)
    {
        
       $_SESSION['teacher_updated'] = "Teacher Updated Successfully";
       $teacher_updated =  $_SESSION['teacher_updated'];
    
    }
    else{

       $_SESSION['teacher_updated_failed'] = "Failed To Update";
       $teacher_updated_failed =  $_SESSION['teacher_updated_failed'];
     
     }
}
?>
      <!-- The Coding Has Been Started From Here -->

        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Modifier Professeur</a>
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
              
              if(isset($teacher_updated)){
                echo $teacher_updated; 
              }
              elseif(isset($teacher_updated_failed)){
                  echo $teacher_updated_failed;
              }
              

            ?> </h5></div>
                    <div class="row">
                        <div class ="center">
                            <div class="col l4">
                            </div>
                            <div class="col l5">
                                <div class="input-field">
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input type="text" value="" name="Matricule" id="Matricule" class="validate">
                                    <label for="Matricule" class="active">Matricule</label>
                                </div>
                                <div class ="">
                                    <button type="submit" name="check" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">chercher</button>
                                </div>
                            </div>                                
                        </div>
                    </div>
                        <?php
                            if(isset($_POST['check'])){
                                $mat = $_POST['Matricule'];
                                $query = "SELECT * FROM `teacher` WHERE `Matricule`='".$mat."';";
                                $run = mysqli_query($con, $query);
                                if(mysqli_num_rows($run) > 0){
                                    
                                   $data = mysqli_fetch_assoc($run);
                                   $id = $data['id'];
                                   $name = $data['name'];
                                   $email = $data['email'];
                                   $contact = $data['contact'];
                                   $position = $data['position'];
                                   $address = $data['address'];
                                   $gender = $data['gender'];
                                   $matricule = $data['Matricule'];
                                   ?>
                                   
                                <div class="row">
                                    <div class="col l5" >
                                        <input type="hidden" value="<?php echo $id; ?>" id="id" name="id">
                                        <div class="input-field">
                                            <i class="material-icons prefix">person</i>
                                            <input type="text" name="name" id="name" value="<?php echo $name; ?>" required="required">
                                            <label for="name">Nom Complet</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">email</i>
                                            <input type="text" name="email" id="email" value="<?php echo $email; ?>"" required="required">
                                            <label for="email">Adresse mail</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">call</i>
                                            <input type="text" name="contact" id="contact" value="<?php echo $contact; ?>"" required="required">
                                            <label for="contact">Numero de telephone</label>
                                        </div>
                                        
                                            
                                    </div>
                                    <div class="col l2"></div>
                                    <div class="col l5 center">
                                        <div class="input-field">
                                            <select name="matiere" >
                                                <option value="" class="disabled">Choisir une option </option>
                                                <?php $rst = mysqli_query($con,"SELECT `libelle` FROM `matier`");
                                                $i = 1;
                                                while($slt = mysqli_fetch_assoc($rst)){?>
                                                    <option value="<?php echo $i;?>" ><?php echo $slt['libelle']; ?></option> 
                                                    
                                                <?php $i++;} ?>
                                            </select>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">location_city</i>
                                            <input type="text" name="address" id="address" value="<?php echo $address; ?>" required="required">
                                            <label for="Address">Adresse</label>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">person</i>
                                            <input type="text" name="Matricule" id="Matricule" value="<?php echo $matricule; ?>" required="required">
                                            <label for="Matricule">Matricule</label>
                                        </div>
                                    </div>
                                </div>
                                <div class = "row"
                                    <div class="col l6 center">
                                        <div class="center">
                                            <label>
                                                <input class="with-gap" name="gender" id="gender" value="Homme" type="radio" <?php if($gender=="Homme"){echo "checked";} ?> required="required" />
                                                <span>Homme</span>
                                            </label>
                                            <label>
                                                <input class="with-gap" name="gender" id="gender" value="Femme" type="radio" <?php if($gender=="Femme"){echo "checked";} ?> required="required" />
                                                <span>Femme</span>
                                            </label>
                                        </div>
                                    </div>    
                                    <div class="center">
                                        <button type="submit" name="submit" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">Mise a jour</button>
                                    </div>
                                </div>
                                    
                                </div>
                                <?php }else{
                                    echo "<script>alert('INVALIDE CNE!!')</script>";
                                }
                                
                            }


                        ?>
                        
            
                </div>
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