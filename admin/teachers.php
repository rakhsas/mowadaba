<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
$ecole = $_SESSION['ecole'];

$query = "SELECT * FROM `teacher`";
$run = mysqli_query($con,$query);

?>
      <!-- The Coding Has Been Started From Here -->

        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Liste Professeurs</a>
                    <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down" style="margin-left: 30px;">
                        <li><a href=""><?php echo $ecole; ?></a></li>
                    </ul>
                </div>        
            </div>
        </nav>


      <!-- The Dashboard Coding Started From Here -->

        <div class="row main">
            <div class="col l12">
                <div class="card">
                    <!--<ul class="collection">
                        <li class="collection-item"></li>
                    </ul>-->
                        <table class="striped">
                            <tr class="lighten-2 z-depth-1" style="background-color: #fff;color:#526Fd7;">
                                
                                <th>Image</th>
                                <th>Name</th>
                                <!--<th>Email</th>-->
                                <th>Contact</th>
                            </tr>
                            
                                <?php
                                $count=0;
                                    while($data = mysqli_fetch_assoc($run)){
                                            $count++;
                                            $image = $data['image'];
                                            $name = $data['name'];$contact = $data['contact'];
                                            //$email = $data['email'];
                                            
                                            
                                    
                                ?><tr>
                                    
                                    <td> <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "teacher.png";
                                    }
                                      ?>" class="responsive-img circle" style="width: 100px;"> </td>
                                    <td><?php echo $name; ?></td>
                                    
                                    <!--<td><?php echo $email; ?></td>-->
                                    <td><?php echo $contact; ?></td>
                                    </tr>
                                <?php } ?>
                            
                        </table>
                    
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