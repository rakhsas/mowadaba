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
    $class = $_POST['matiere'];
    $password =  $_POST['password'];
    $Matricule = $_POST['Matricule'];
    //move_uploaded_file($temp_image_name,"../img/$image_name");
   $query = "INSERT INTO `teacher`(`name`, `email`, `contact`, `gender`, `idMatier`, `password`, `Matricule`) VALUES ('$name','$email','$contact','$gender',$class,'$password','$Matricule')";
    $run = mysqli_query($con,$query);
    
    if($run)
    {
        $_SESSION['teacher_added'] = "Teacher Added Successfully";
        $teacher_added =  $_SESSION['teacher_added'];
    }
    else{

      $_SESSION['teacher_added_failed'] = "Failed To Add New Teacher";
      $teacher_added_failed =  $_SESSION['Teacher_added_failed'];
     }
}
?>
      <!-- The Coding Has Been Started From Here -->

        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Ajouter un Professeur</a>
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
              
              if(isset($teacher_added)){
                echo $teacher_added; 
              }
              

            ?> </h5></div>
                    <div class="row">
                        <div class="col l5">
                            <div class="input-field">
                                    <i class="material-icons prefix">person</i>
                                <input type="text" name="name" id="name" required="required">
                                <label for="name">Nom et Prénom</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                    <input type="text" name="email" id="email" required="required">
                                    <label for="email">Addresse Mail</label>
                                </div>
                                <div class="input-field">
                                        <i class="material-icons prefix">call</i>
                                        <input type="text" name="contact" id="contact" required="required">
                                        <label for="contact">Numéro téléphone</label>
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
                                <!--
                                <div class="input-field">
                                    <select multiple>
                                    <option value="" disabled selected>Choisir les classes</option>
                                    <?php $rs = mysqli_query($con,"SELECT distinct(standerd) FROM `students`");
                                        $i = 1;
                                        while($sl = mysqli_fetch_assoc($rs)){?>
                                            <option value="<?php echo $i;?>" ><?php echo $sl['standerd']; ?></option>
                                        <?php $i++;} ?>
                                        
                                        <script>
                                        /*document.addEventListener('DOMContentLoaded', function() {
                                            
                                        var elems = document.querySelectorAll('select');
                                        var instances = M.FormSelect.init(elems, options);
                                        });$(document).ready(function () {
                                        $('select').material_select();
                                        });
                                        $(document).ready(function(){
                                        $('select').formSelect();
                                        });*/
                                        
                                        </script>
                                    </select>
                                </div>-->
                                    <!---->
                                    <div class="input-field">
                                        <i class="material-icons prefix">lock</i>
                                        <input type="password" name="password" id="password" required="required">
                                        <label for="password">Mot de Passe</label>
                                    </div>
                                    
                                    <div class="input-field">
                                      <i class="material-icons prefix">person</i>
                                      <input type="text" name="Matricule" id="Matricule" required="required">
                                      <label for="Matricule">Numero de Somme</label>
                                  </div>

                            </div>
                        <div class="col l4 center">
                        </div>
                        
                        <div class="col l6">
                          <!--<input type="radio" name="gender" id="male" value="male" required="required">
                          <label for="male" >Homme</label>
                          <input type="radio" name="gender" id="female" value="female" required="required">
                          <label for="female">Femme</label>
                          -->
                            <label>
                                <input type="radio" name="gender" id="gender" value="Femme" class="with-gap" />
                                <span>Femme</span>
                            </label>
                            <label>
                                <input type="radio" name="gender" id="gender" value="Homme" class="with-gap" />
                                <span>Homme</span>
                            </label>

                        </div>
                    </div>
                     <div class="center">
                        <button type="submit" name="submit" style="width:auto%;background-color:#FF8000;border-radius: 5px;" class="btn ">Ajouter</button>
                    </div>
                </div>
              </form>

            </div>
        </div>

      <!-- The Navbar Menu Collection List -->

      <?php
require_once('../include/sidenavadmin.php');
require_once('../include/footer.php');
?>