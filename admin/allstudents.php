<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');
$ecole=$_SESSION['ecole'];

$query = "select * from `students` order by `ideleve` and `standerd`Asc";
$run = mysqli_query($con,$query);

?>
      <!-- The Coding Has Been Started From Here -->

        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo center hide-on-med-and-down"  style="margin-left: 115px;">Liste Élèves</a>
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
                <div class="card">
                    <ul class="collection">
                        <li class="collection-item">
                        <table class="striped">
                            <tr  class="class" style="background-color:#fff; width:auto;color:#526Fd7;">
                                <!--<th style="text-align: center;margin-left:0;">No</th>-->
                                <th style="text-align: center;margin-left:0;">Image</th>
                                <th style="text-align: center;margin-left:unset;">CNE</th>
                                <th style="text-align: center;margin-left:0;">Nom et Prenom</th>
                                <th style="text-align: center;margin-left:0;">Filiere</th>
                                <!--<th style="text-align: center;margin-left:0;">Contact</th>-->
                            </tr>
                            
                                <?php
                                $count=0;
                                while($data = mysqli_fetch_assoc($run)){
                                        $count++;
                                        $image = $data['image'];
                                        $fstname = $data['fstname'];
                                        $lstname = $data['lstname'];
                                        $rollno = $data['rollno'];
                                        $standerd = $data['standerd'];
                                        $gender = $data['gender'];
                                        $contact = $data['contact'];
                                ?><tr>
                                <!--<td style="text-align: center;"> <?php echo $count; ?> </td>-->
                                <td> <img src="../img/<?php
                                if (isset($image) && !empty($image)){
                                 echo $image;
                                }
                                else
                                {
                                  echo 'user.png';
                                }
                                  ?>" class="responsive-img circle" style="text-align: center;width: 100px;"> </td>
                                    <td style="text-align: center;"><?php echo $rollno; ?></td>
                                    <td style="text-align: center;"><?php echo $fstname.' '.$lstname; ?></td>
                                    <td style="text-align: center;"><?php echo $standerd; ?></td>
                                    <!--<td style="text-align: center;"><?php echo $contact; ?></td>-->
                                    </tr>
                                <?php } ?>
                            
                        </table>
                    </li>
                    </ul>
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