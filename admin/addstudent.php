<?php
require_once('../include/header.php');


    require_once('../include/dbcon.php');
    $id = $_SESSION['uid'];
    
    $ecole = $_SESSION['ecole'];
    if(isset($_POST['submit'])){
      $id = 'id';
    //$image_name = $_FILES['image']['name'];
    //$temp_image_name =  $_FILES['image']['tmp_name'];
    $rollno = $_POST['rollno'];
    $standerd= $_POST['standerd'];
    $fstname= $_POST['fstname'];
    $lstname= $_POST['lstname'];
    $gender= $_POST['gender'];
    $contact = $_POST['contact'];
    $DateNaissance = $_POST['date'];
    $email =  $_POST['email'];
    //$Address = $_POST['Address'];
    $city = $_POST['city'];
    $Numero_de_Parent = $_POST['Numero_de_Parent'];
    move_uploaded_file($temp_image_name,"../img/$image_name");
    $result = mysqli_query($con,"select max(ideleve)+1 from students where standerd = '$standerd'");
    $ideleve = mysqli_fetch_array($result);
    $max = $ideleve[0];
    $hash = md5($rollno);
    $query = "INSERT INTO `students`(`ideleve`,`rollno`, `standerd`, `fstname`,`lstname`, `gender`, `contact`,`DateNaissance`, `email`,`password`,`Numero de Parent`,`token`) VALUES ($max,'$rollno','$standerd','$fstname','$lstname','".$gender."','$contact','$DateNaissance','$email','$rollno','$Numero_de_Parent','$hash')";

    $run = mysqli_query($con,$query);
    if($run)
    {
        $_SESSION['student_added'] = "Student Added Successfully";
        $student_added =  $_SESSION['student_added'];
    }
    else{

      $_SESSION['student_added_failed'] = "Failed To Add New Student";
      $student_added_failed =  $_SESSION['student_added_failed'];
     }
}
?>
      <!-- The Coding Has Been Started From Here -->

    <nav class="" style="background-color:#526Fd7;">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Ajouter Éleve</a>
                <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
                <ul class="left hide-on-med-and-down" style="margin-left: 30px;">
                    <li><a href=""><?php echo $ecole; ?></a></li>
                </ul>
            </div>        
        </div>
      </nav>
    <style>
        [type="radio"]:checked + label::after, [type="radio"].with-gap:checked + label::after {
                    background-color: rgb(255, 138, 6) !important;
                }
                [type="radio"]:checked + label::after, [type="radio"].with-gap:checked + label::before, [type="radio"].with-gap:checked + label::after {
                    border: 2px solid rgb(255, 138, 6) !important;
                }
                .input-field .prefix .active{
                    color:#526Fd7;
                }
    </style>
      


      <!-- The Dashboard Coding Started From Here -->

        <div class="row main">
            <div class="col l12 m12 s12">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-panel">
                  <div class="center">
                    <h5 class="center red-text"><?php 
              
                      if(isset($student_added)){
                        echo $student_added; 
                      }?>
              

                    </h5>
                  </div>
                  <div class="row">
                    <!--
                    <div class="col l4 m12 s12 center">
                      <div class="input-field file-field">
                        <input type="file" name="image" class="dropify" data-show-remove="false" data-default-file="../images/user.png" />
                      </div>
                    </div>
                    -->
                    <div class="col l5 center">
                      <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="rollno" id="rollno" required="required">
                        <label for="rollno">CNE</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="lstname" id="lstname" required="required">
                        <label for="lstname">Nom</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="fstname" id="fstname" required="required">
                        <label for="fstname">Prenom</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">call</i>
                        <input type="text" name="contact" id="contact" required="required">
                        <label for="contact">Telephone</label>
                      </div>
                      <!--<div class="input-field">
                        <i class="material-icons prefix">call</i>
                        <input type="text" name="Numero_de_Parent" id="Numero_de_Parent" required="required">
                        <label for="Numero_de_Parent">Numero de Parent</label>
                      </div>-->
                      
                    </div>
                    <div class="col l2 center"></div>
                            <div class="col l5 center" >
                                <div class="input-field">
                                <select name="standerd" >
                                    <option value="" class="disabled">Choisir une option </option>
                                      <?php $rst = mysqli_query($con,"SELECT DISTINCT(standerd) from students");
                                      while($slt = mysqli_fetch_assoc($rst)){?>
                                           <option value="<?php echo $slt['standerd']; ?>" ><?php echo $slt['standerd']; ?></option> 
                                        
                                      <?php } ?>
                                </select>
                                </div>
                                    <div class="input-field">
                                        <i class="material-icons prefix">location_city</i>
                                        <input type="text" name="city" id="city" required="required">
                                        <label for="city">Ville</label>
                                    </div>
                                    <div class="input-field">
                                      <i class="material-icons prefix">email</i>
                                      <input type="text" name="email" id="email" >
                                      <label for="email">Email</label>
                                    </div>
                                    <div class="input-field">
                                        <i class="material-icons prefix">cake</i>
                                        <input type="text" value="" name="date" id="date" required="required">
                                        <label for="date">Date Naissance</label>
                                    </div>
                                    <label>
                                    <input class="with-gap" name="gender" id="gender" value="Homme" type="radio" required="required"/>
                                                <span>Homme</span>
                                            </label>
                                            <label>
                                                <input class="with-gap" name="gender" id="gender" value="Femme" type="radio"  required="required" />
                                                <span>Femme</span>
                                            </label>

                                </div>
                        <div class="row">
                        <div class="col l4 center">
                          
                        </div>
                        <div class="col l6">
                       

                        </div>
                        </div>
                    </div>
                     
                    <button type="submit" name="submit" style="width:100%;background-color:#FF8000;" class="btn">Ajouter</button>
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