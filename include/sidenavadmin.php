<?php
require_once('dbcon.php');
$uid = $_SESSION['uid'];
$query = "SELECT * FROM `admin` WHERE `id`='$uid'";
$run = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($run);
$name = $data['name'];
$email = $data['email']; 
$image = $data['image'];
?>

<ul class="sidenav collapsible sidenav-fixed" id="slide-out">
        <li>
          <div class="user-view" >
            <div class="background">
              <img src="../images/bg1.jpg" class="responsive-img" alt="" style="background-color:white; opacity:0.4">
            </div>
            <a href="" class="">
              <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "teacher.png";
                                    }
                                      ?>" alt="" class="responsive-img circle">
            </a>
            <span class="name" style="font-color: #fff; font-weight:bolder"><?php echo $name; ?></span>
            <span class="email" style="font-color: #fff; font-weight:bolder"><?php echo $email; ?></span>
          </div>
        </li>
        <li><a href="../admin/dashboardadmin"><i class="material-icons" style="color: black;">dashboard</i>Accueil</a></li>
        <li>
          <div class="collapsible-header">
           <i class="collapsible-header material-icons" style="color: black;">person</i> <span style="margin-left:25px;color: black;">Élèves</span>  <i class="material-icons right prefix" style="margin-right:0; margin-left:125px;color: black;">arrow_drop_down</i>
          </div>
          <div class="collapsible-body">
                <ul style="background-color: #ececec;">
                  <li>
                  <li><a href="addstudent"><i class="material-icons">person_add</i>Ajouter Élève</a></li>
                  <li><a href="addstudents"><i class="material-icons">class</i>Ajouter Classe</a></li>
                  <li><a href="editstudent"><i class="material-icons">edit</i>Modifier Élève</a></li>
                  <li><a href="deletestudent"><i class="material-icons">delete</i>Supprimer Élève</a></li>
                  <li><a href="allstudents"><i class="material-icons">person</i>Liste Élèves</a></li>
                  </li>
                </ul>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
           <i class="collapsible-header material-icons" style="color: black;">pages</i> <span style="margin-left:25px;color: black;">Absence</span>  <i class="material-icons right prefix " style="margin-right:0; margin-left:110px;color: black;">arrow_drop_down</i>
          </div>
          <div class="collapsible-body">
                <ul style="background-color: #ececec;">
                  <li>
                  <li><a href="AbsJour"><i class="material-icons">present_to_all</i>Absence du jour</a></li>
                  <li><a href="abpClas"><i class="material-icons">filter_frames</i>Absence par classe</a></li>
                  <li><a href="abpEtud"><i class="material-icons">filter_b_and_w</i>Absence par Élève</a></li>
                  <li><a href="absence"><i class="material-icons">file_download</i>Rapports Mensuel</a></li>
                  <!--<li><a href="absjourupdate"><i class="material-icons">file_download</i>now</a></li>-->
                  </li>
                </ul>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
           <i class="collapsible-header material-icons" style="color: black;">person</i> <span style="margin-left:25px;">Professeurs</span><i class="material-icons right prefix " style="margin-right:0; margin-left:90px;color: black;">arrow_drop_down</i>
          </div>
          <div class="collapsible-body">
            <ul style="background-color: #ececec;">
              <li>
              <li><a href="addteacher"><i class="material-icons">group_add</i>Ajouter Professeur</a></li>
              <li><a href="editteacher"><i class="material-icons">edit</i>Modifier Professeur</a></li>
              <li><a href="deleteteacher"><i class="material-icons">delete</i>Supprimer Professeur</a></li>
              <li><a href="affect"><i class="material-icons">filter_tilt_shift</i>Affecter classes</a></li>
              <li><a href="teachers"><i class="material-icons">groups</i>Liste Professeurs</a></li>
              </li>
            </ul>
          </div>
        </li>
        <li>
        </li>
        <!--<li>
          <div class="collapsible-header">
            <i class="collapsible-header material-icons">library_books</i> <span style="margin-left:25px;">Cours</span>  <i class="material-icons right prefix" style="margin-right:0; margin-left:122px;">arrow_drop_down</i>
          </div>
          <div class="collapsible-body">
            <ul style="background-color: #ececec;">
              <li>
              <a href="addcourse.php"><i class="material-icons">library_books</i>Ajouter un Cours</a>
              <a href="course.php"><i class="material-icons">library_books</i>Tous les Cours</a>
              </li>
            </ul>
          </div>
        </li>-->
        <div class="divider"></div>
        <li><a href="../include/logout.php"><i class="material-icons" style="color:black;">logout</i>Déconnexion</a></li>
        <!--<li><a href="#"><i class="material-icons" style="color:black;">info</i>Mon compte</a></li>
        <li><a href="#"><i class="material-icons" style="color:black;">call</i>Contact</a></li>-->

      </ul>

