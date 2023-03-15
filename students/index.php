<?php 
require_once('../include/students/header.php');
require_once('../include/students/sidenavstudent.php');

$query = "select * from `students` where standerd = `$standerd` order by `rollno` ASC";
$run = mysqli_query($con,$query);

$rq = "select * from `students` where rollno = '$rollno'";
$rd = mysqli_query($con,$rq);


$std="Select ideleve,rollno,image,fstname,lstname,standerd,gender,contact,`Lieu de Naissance` from students where standerd = '$standerd'";
$std1 = mysqli_query($con,$std);

?>

    <nav class="" style="background-color:#526Fd7;">
        <div class="container">
            <div class="nav-wrapper">
                <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Profile</a>
                <a href="" class="sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></a>
                
            </div>
        </div>
    </nav>
    <div class="row mufazmi">
        <div class="col s12 m12 l3">
            <div class="card-panel z-depth-0" style="padding: 15px">
                <div class="card-image center">
                <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" alt="" class="responsive-img circle" style="width: 120px; border: 3px solid gray;height:120px;" alt="" >
                    <h5 class="center"><?php echo $fstname.' '.$lstname ?></h5>
                    <div class="divider"></div>
                    <table >
                        <thead>
                            <tr>
                                <th>CNE</th>
                                <td class="blue-text"><?php echo $rollno ?></td>
                            </tr>
                            <tr>
                                <th>Classe</th>
                                <td class="blue-text"><?php 
                                //$sd = intval($standerd);filiere($sd)
                                echo $standerd; ?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l9">
            <div class="card z-depth-0">
                <style>
                    .tabs .tab a{
                        color:#FF8000;
                    } /*Black color to the text*/
            
                    .tabs .tab a:hover {
                        background-color:#eee;
                        color:#FF8000;
                    } /*Text color on hover*/
            
                    .tabs .tab a.active {
                        background-color:#888;
                        color:#FF8000;
                    } /*Background and text color when a tab is active*/
            
                    .tabs .indicator {
                        background-color:black;
                    }
                </style>
                <ul class="tabs">
                    <li class="tab"><a href="#profile" class="" > Profile </a></li>
                    <li class="tab"><a href="#exam" class="" > Examens </a></li>
                    <li class="tab"><a href="#ana" class="" > Classe </a></li>
                </ul>
                <div id="profile" class="col s12 white " >
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                            <table >
                                <tbody>  
                                
                                    <tr>
                                        <th>Date de Naissance</th>
                                        <td>

                                        <?php
                                        
                                while($wor = mysqli_fetch_assoc($rd)){
                                        $datenaissance = $wor['DateNaissance'];
                                        $Adresse = $wor['adresse'];
                                        $city  = $wor['Lieu de Naissance'];
                                        $standerd = $wor['standerd'];
                                        
                                        echo $datenaissance;
                                }
                                ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Numéro de Téléphone</th>
                                        <td><?php echo $contact; ?></td>
                                    </tr>
                                    
                                   <tr>
                                        <th>Email</th>
                                        <td><?php echo $email; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card"  style="padding-left:10px; padding-right: 10px;">
                            <div class="left">
                                <h5>Adresse</h5>
                            </div>
                            <table>
                                <tbody>
                                    <tr>
                                        <th>VILLE</th>
                                        <td><?php echo $city; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Adresse</th>
                                        <td><?php echo $Adresse; ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                </div>
                <div id="ana" class="col s12 white ">
                        <div class="card"  style="padding-left:5px; padding-right: 5px;">
                        <table class="striped">
                            <tr class="class" style="color: #526Fd7; width:auto;">
                                <th style="text-align: center;">N~</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Nom et Prenom</th>
                                <th style="text-align: center;">Contact</th>
                            </tr>
                            
                                <?php
                                $count=0;
                                while($data = mysqli_fetch_assoc($std1)){
                                        $count++;
                                        $image = $data['image'];
                                        $fstname = $data['fstname'];
                                        $lstname = $data['lstname'];
                                        $rollno = $data['rollno'];
                                        $standerd = $data['standerd'];
                                        //$city = $data['Lieu de Naissance'];
                                        $cont = $data['contact'];
                                        //$datenaissance = $data['DateNaissance'];
                                ?><tr >
                                <td  style="text-align: center;"> <?php echo $count; ?> </td>
                                <td> <img src="../img/<?php
                                if (isset($image) && !empty($image)){
                                 echo $image;
                                }
                                else
                                {
                                  echo 'user.png';
                                }
                                  ?>" class="responsive-img circle" style="width: 100px;"> </td>
                                    <td  style="text-align: center;"><?php echo $fstname.'  '.$lstname; ?></td>
                                    <td  style="text-align: center;"><?php echo $cont; ?></td>
                                    </tr>
                                <?php } ?>
                            
                        </table>
        
                                </tbody>
                            </table>
                        </div>
                        

                </div>

                
                <div id="exam" class="col s12">Tesaasdfasdfsdft 1</div>
            
            </div>
        </div>
    </div>

    

    <ul class="dropdown-content" id="dropdown">
       
    <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Logout</a></li>
       
    </ul>


<?php require_once('../include/students/footer.php'); ?>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.dropdown-trigger').dropdown();
            $('.tabs').tabs();
        });
    </script>
    <script type="text/javascript" src="js/materialize.min.js"></script>