<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
$ecole = $_SESSION['ecole'];
?>
      <!-- The Coding Has Been Started From Here -->

    <nav class="" style="background-color:#526Fd7;">
        <div class="container">
            <div class="nav-wrapper">
                <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Affecter classes</a>
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
                            <h5 class="center red-text"><?php if(isset($student_added)){echo $student_added; }?></h5>
                        </div>
                        <div class="row">
                            
                            <div class="col  s3 center" style="background-color:#ececec;"><h5 style="text-align:center">TCSF</h5>
                                <div class="divider" style="color:black; border: solid 1px black"></div><br>
                                <?php $rst = mysqli_query($con,"SELECT distinct(standerd) FROM `students` where standerd like '%TCSF%'");
                                      function base64_url_encode($input) {
                                        return strtr(base64_encode($input), '+/=', '._-');
                                        }

                                      while($slt = mysqli_fetch_assoc($rst)){?>
                                      <?php $encoded = base64_url_encode($slt['standerd']); ?>
                                           <a class="waves-effect waves-teal btn-flat" href="profclass?nom=<?=$encoded?>"><?php echo $slt['standerd'];?></a>
                                           <br>
                                           <?php;}?>
                                </div>
                                <div class="col l1 center"></div>
                                <div class="col s3 center" style="background-color:#ececec;"><h5 style="text-align:center">1BAC</h5>
                                    <div class="divider" style="color:black; border: solid 1px black"></div><br>
                                    <?php $rst = mysqli_query($con,"SELECT distinct(standerd) FROM `students` where standerd like '%1BAC%'");
                                        
                                        while($slt = mysqli_fetch_assoc($rst)){?>
                                        <?php $encoded = base64_url_encode($slt['standerd']); 
                                            //$encoded = Hash::make('"$slt['standerd']"');?>
                                            <a class="waves-effect waves-teal btn-flat" href="profclass?nom=<?=$encoded?>"><?php echo $slt['standerd'];?></a><br>
                                            <br>
                                            <?php;}?>
                                </div>
                                <div class="col l1 center"></div>
                                <div class="col s3 center" style="background-color:#ececec;"><h5 style="text-align:center">2BAC</h5>
                                    <div class="divider" style="color:black; border: solid 1px black"></div><br>
                                    <?php $rst = mysqli_query($con,"SELECT distinct(standerd) FROM `students` where standerd like '%2BAC%'");
                                        $i = 1;
                                        while($slt = mysqli_fetch_assoc($rst)){?>
                                        <?php $encoded = base64_url_encode($slt['standerd']); ?>
                                            <a class="waves-effect waves-teal btn-flat" href="profclass?nom=<?=$encoded?>"><?php echo $slt['standerd'];?></a>
                                            <br>
                                            <?php;}?>
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