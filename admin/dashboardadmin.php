<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');

$id = $_SESSION['uid'];
/* Fetching The Number Of Students */
$query = "SELECT * FROM `students`";
$run = mysqli_query($con,$query);
$student_row = mysqli_num_rows($run);

// Fetching The Number Of Courses

$query1 = "SELECT * FROM course";
$run1 = mysqli_query($con,$query1);
$course_row = mysqli_num_rows($run1);

// Fetching The Number Of Teachers

$query2 = "SELECT * FROM teacher";
$run2 = mysqli_query($con,$query2);
$teacher_row = mysqli_num_rows($run2);

//rgtrodfokkdl

$query3 = "SELECT * FROM `absence` WHERE `justifiee`= 'Non' and comm_abs =  DATE(NOW())";
$run3 = mysqli_query($con,$query3);
$absence_row = mysqli_num_rows($run3);

//ertert

$query4 = mysqli_fetch_row(mysqli_query($con,"select NomEtab from `etablissement` E , admin A where A.id=$id and E.idEtab = A.idEtab"));
$ecole = $query4[0];
?>
      <!-- The Coding Has Been Started From Here -->

      <nav class="" style="background-color:#526Fd7;">
        <div class="container">
            <div class="nav-wrapper">
                <!--<a href="" class="brand-logo left hide-on-med-and-down" style="margin-left: 115px;display: table;"><h6></h6></a>-->
                <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Statistiques</a>
                <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons" style="color: white;">menu</i></a>
                <ul class="left hide-on-med-and-down" style="margin-left: 30px;">
                    <li><a href=""><?php echo $ecole; ?></a></li>
                </ul>
            </div>        
        </div>
      </nav>
      


      <!-- The Dashboard Coding Started From Here -->

      <div class="row main">
        <div class="col m12 s12 l3">
          <div class="card">
            <div class="card-content  lighten-3" style="background-color: #fff; color:#167D7F;">
              <h3  style="color: #526Fd7;"> <b><?php echo $student_row; ?></b> </h3>
              <p  style="color: #526Fd7;"> <b>Ėlèves</b> </p>
            </div>
            <div class="center card-action  lighten-2" style="background-color:#FF8000;">
              <a style="color: #fff;" href="allstudents.php">Parcourir </a>
            </div>
          </div>
        </div>
        <div class="col m12 s12 l3">
            <div class="card">
              <div class="card-content  lighten-3 "style="background-color: #fff; color:#167D7F;">
              <h3  style="color: #526Fd7;"> <b><?php echo $teacher_row; ?></b> </h3>
                <p  style="color: #526Fd7;"> <b>Professeurs</b> </p>
                  
              </div>
              <div class=" center card-action lighten-2 " style="background-color:#FF8000;">
             <a style="color:#fff;" href="teachers">Parcourir</a>
              </div>
            </div>
          </div>
          <div class="col m12 s12 l3">
              <div class="card">
                <div class="card-content lighten-3 " style="background-color: #fff; color:#167D7F;">
                  <h3 style="color: #526Fd7;"> <b><?php echo $course_row; ?></b> </h3>
                  <p  style="color: #526Fd7;"> <b>Cours</b> </p>
                </div>
                <div class=" center card-action lighten-2" style="background-color:#FF8000;" >
               <a style="color: #fff;" href="">Parcourir </a>
                </div>
              </div>
            </div>
            <div class="col m12 s12 l3">
                <div class="card">
                  <div class="card-content  lighten-3" style="background-color: #fff; color:#167D7F;">
                    <h3 style="color: #526Fd7;"> <b><?php echo $absence_row ?></b> </h3>
                    <p  style="color: #526Fd7;"> <b> Absence </b> </p>
                  </div>
                  <div class=" center card-action lighten-2 " style="background-color:#FF8000;">
                 <a style="color: #fff;" href="AbsJour">Parcourir </a>
                  </div>
                </div>
              </div>
      </div>


      <!-- The Navbar Menu Collection List -->
      <?php
require_once('../include/sidenavadmin.php');
?>

      <?php
require_once('../include/footer.php');
?>