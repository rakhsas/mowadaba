<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');
$id = $_SESSION['uid'];
$ecole = $_SESSION['ecole'];
  if(isset($_POST['delete'])){
    $standerd = $_POST['standerd'];
    $name = $_POST['name'];
    //$requet = "SELECT DISTINCT standerd from students";
    //$rst = mysqli_query($con,$requet);
    $query = "delete from students where `rollno` = '".$name."'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 0)
    {
      echo "<script> alert('No Student Found')</script>";
    }
  }
?>

      <!-- The Coding Has Been Started From Here -->

      
      <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <!--<a href="" class="brand-logo left hide-on-med-and-down" style="margin-left: 115px;display: table;"><h6></h6></a>-->
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Supprimer Éleve</a>
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
                <div class="row">
                    <div class="center">
                        <div class="col l4">
                        </div>
                        <div class="col l5">
                            <div class="input-field">
                                <input type="text" name="name" id="name">
                                <label for="name">CNE</label>
                            </div>
                            <div class="">
                                <button class="btn" style="width:auto;border-radius: 5px;background-color:#FF8000;"  name="delete">Supprimer L'etudiant</button>
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


