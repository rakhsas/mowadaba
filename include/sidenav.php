<?php

require_once('dbcon.php');
$uid = $_SESSION['uid'];
$query = "SELECT * FROM `teacher` WHERE `id`='$uid'";
$run = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($run);
$name = $data['name'];
$email = $data['email']; 
$image = $data['image'];
?>
<?php
                    function base64_url_encode($input) {
                        return strtr(base64_encode($input), '+/=', '._-');
                    }
                    $ID = base64_url_encode($teacher_id);
                  ?>


<ul class="sidenav collapsible sidenav-fixed" id="slide-out">
        <li>
          <div class="user-view" >
            <div class="background">
              <img src="../images/bg1.jpg" class="responsive-img" alt="" style="background-color:white; opacity:0.4">
            </div>
            <a href="infos?id=<?php echo $ID;?>" class="">
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
        <li><a href="../teacher/dashboard"><i class="material-icons" style="color:black;">dashboard</i>Accueil</a></li>
        <li>
        <div class="collapsible-header">
           <i class="collapsible-header material-icons" style="color:black;">person</i> <span style="margin-left:25px;">Étudiants</span>  <i class="material-icons right prefix" style="color:black; margin-right:0; margin-left:100px;">arrow_drop_down</i>
          </div>
          <div class="collapsible-body">
                <ul style="background-color: #ececec;">
                  <li>
                  
                  <li><a href="cl?id=<?php echo $ID;?>"><i class="material-icons">person</i>Classes</a></li>
                  <!--<li><a href=""><i class="material-icons">person</i>Tous les Étudiants</a></li>-->
                  </li>
                </ul>
          </div>
        </li>
        <li><?php
                
                $ID = base64_url_encode($teacher_id);
              ?>
        <!--<div class="collapsible-header">
           <i class="collapsible-header material-icons">person</i> <span style="margin-left:25px;">Professeurs</span>  <i class="material-icons right prefix " style="margin-right:0; margin-left:85px;">arrow_drop_down</i>
          </div>
          <div class="collapsible-body">
            <ul style="background-color: #ececec;">
              <li>
              
              <li><a href=""><i class="material-icons">group_add</i>Ajouter un Professeur</a></li>
              <li><a href="editteacher.php?id=<?php echo $ID;?>"><i class="material-icons">edit</i>Données Personnelles</a></li>
              </li>
            </ul>
          </div>-->
        </li>
        <li>
        </li>
        <li>
          <!--<div class="collapsible-header">
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
        <li><a href="../pfe/home.php"><i class="material-icons" style="color:black;">work</i>PFE</a></li>
        <div class="divider"></div>
        <li><a href="infos?id=<?php echo $ID;?>"><i class="material-icons" style="color:black;">account_circle</i>Mon Compte</a></li>
        
        <li><a href="../include/logout.php"><i class="material-icons" style="color:black;">logout</i>Déconnexion</a></li>
        <!--<li><a href="contact.php"><i class="material-icons">call</i>Contact</a></li>-->

      </ul>
