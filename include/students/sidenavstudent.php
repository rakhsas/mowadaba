<?php
require_once('../include/dbcon.php');
$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM `students` WHERE `id`='$student_id'";
$run = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($run);
$fstname = $data['fstname'];
$lstname = $data['lstname'];
$email = $data['email']; 
$image = $data['image'];
$rollno = $data['rollno'];
$token = $data['token'];
$standerd = $data['standerd'];
$contact = $data['contact'];
$qq = $student_id;
$ecr = (($qq * 4)/956783);
?>
<ul id="slide-out" class="sidenav collapsible sidenav-fixed">
        <li class="user-view">
            <div class="background">
                <img src="../images/sms_bg.jpg" class="responsive-img" alt="">
            </div>
            <a href="profile.php">
            <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" alt="" class="responsive-img circle">
            </a>
            <span class="name" style="color: white;"><?php echo $fstname.' '.$lstname ?></span>
            <span class="email" style="color: white;"><?php echo $email ?></span>
        </li>
        <li><a href="index.php"><i class="material-icons">dashboard</i> Accueil </a></li>
        <li>
          <div class="collapsible-header">
            <ul>
              <li>
              <i class=" collapsible-header material-icons" style="color:#757575;">perm_identity</i> <span style="margin-left:18px;">Informations</span>  <i class="material-icons right prefix" style="margin-right:0; margin-left:30px;margin-top:7px; color:#757575;">arrow_drop_down</i>
              </li>
            </ul>
          </div>
          <div class="collapsible-body">
            <ul style="overflow-x: hidden">
              <li>
              <li><a href="../students/editstudent?id=<?=$ecr?>" ><i class="material-icons" style="margin-left:10px;">edit</i>Infos Personnel</a></li>
              <li><a href="../students/hh?token=<?=$token?>" ><i class="material-icons" style="margin-left:10px;">edit</i>Changer Mot de Passe</a></li>
              </li>
            </ul>
          <div class="divider"></div>
          </div>
        </li>
        
        <div class="divider"></div>
        <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Déconnexion</a></li>
        <li><a href="about.phpjh"><i class="material-icons">info</i>À Propos</a></li>
    </ul>