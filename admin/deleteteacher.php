<?php
require_once('../include/header.php');require_once('../include/dbcon.php');
$ecole = $_SESSION['ecole'];

  if(isset($_POST['delete'])){
    //$standerd = $_POST['standerd'];
    $Matricule = $_POST['mat'];
    //$requet = "SELECT DISTINCT standerd from students";
    //$rst = mysqli_query($con,$requet);
    $query = "delete from teacher where `Matricule` = '".$Matricule."'";
    $run = mysqli_query($con,$query);
    if($run)
    {
        
       $_SESSION['teacher_removed'] = "Teacher removed Successfully";
       $teacher_removed =  $_SESSION['teacher_removed'];
    
    }
    else{

       $_SESSION['teacher_removed_failed'] = "Failed To remove";
       $teacher_removed_failed =  $_SESSION['teacher_removed_failed'];
     
     }
  }
?>

      <!-- The Coding Has Been Started From Here -->

        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;"> Supprimer Professeur </a>
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
            <form action="" method="POST">
              <div class="card-panel">
              <div class="center"
              <div class="center">
                <h5 class="center red-text"><?php 
              
              if(isset($teacher_removed)){
                echo $teacher_removed; 
              }
              elseif(isset($teacher_removed_failed)){
                  echo $teacher_removed_failed;
              }
              

            ?> </h5></div>
                <div class="row">
                    <div class="center">
                        <div class="col l4">
                        </div>
                        <div class="col l5">
                            <div class="input-field">
                                <input type="text" name="mat" id="mat">
                                <label for="mat">Matricule</label>
                            </div>
                            <div class="">
                                <button class="btn" style="width:auto;border-radius: 5px;background-color:#FF8000;"  name="delete">Supprimer Le Professeur</button>
                            </div>
                        </div>
                  </div>
                </div>
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


