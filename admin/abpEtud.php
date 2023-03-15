
<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');   
$ecole = $_SESSION['ecole'];
?>
    <!-- the nav -->
        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Absence par Élève</a>
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
                            <h5 class="center red-text"><?php
                                if(isset($student_updated)){
                                    echo $student_updated;
                                }
                                elseif(isset($student_updated_failed)){
                                    echo $student_updated_failed."<br>".mysqli_error($con);
                                }
                            ?> </h5>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">perm_identity</i>
                                <input type="text" value="" name="CNE" id="CNE" class="validate">
                                <label for="CNE">CNE</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input type="date" class="datepicker" name="dateDebut" id="dateDebut">
                                <label for="dateDebut">From</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input type="date" class="datepicker" name="dateFin" id="dateFin">
                                <label for="dateFin">To</label>
                            </div>
                        </div>
                        <div class="row center">
                            <button type="submit" name="check" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">chercher</button>
                        </div>
                    </div>
                        <?php
                            if(isset($_POST['check'])){
                                
                                $cne = $_POST['CNE'];$dateDebut = $_POST['dateDebut'];$dateFin = $_POST['dateFin'];
                                $no = mysqli_fetch_row(mysqli_query($con,"Select standerd,fstname,lstname from students where rollno = '$cne'"));
                                $nomcl = $no[0];$fstname = $no[1].' '.$no[2];
    $run1 = mysqli_query($con,"Select * from absence A,students S,matier M where A.rollno = S.rollno and A.idMatiere = M.idMatiere and A.rollno ='$cne' and comm_abs between '$dateDebut' and '$dateFin'");
                                if(mysqli_num_rows($run1) > 0){
                                    $rest = date_diff(date_create($dateDebut),date_create($dateFin));
                                    ?>
                                <div   id="impr">
                                    <ul class="collection">
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col l4 center">
                                                    <table style = "border: 0px solid black;">
                                                        <tbody>
                                                            <tr style = "border: 0px solid black;">
                                                                <td style = "border: 0px solid black;"> Nom et Prenom :  <?php echo $fstname;?></td>   
                                                            </tr>
                                                            <tr style = "border: 0px solid black;">
                                                                <td style = "border: 0px solid black;"> Class :  <?php echo $nomcl;?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col l4 right">
                                                    <table style = "border: 0px solid black;">
                                                        <tbody>
                                                            <tr style = "border: 0px solid black;">
                                                                <td style = "border: 0px solid black;"> Duree :  <?php echo $rest->format("%a Jours"); ?></td>
                                                            </tr>
                                                            <tr style = "border: 0px solid black;">
                                                                <td style = "border: 0px solid black;"> Annee :  <?php echo (date("Y")-1)."/".date("Y") ;?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <table style = "border: 0px solid black;" class="">
                                                    <thead>
                                                        <tr class="class" style="background-color: #fff; width:auto;color:#526Fd7;">
                                                            
                                                            <th style="text-align: center;margin-left:0;">Matiere</th>
                                                            <th style="text-align: center;margin-left:0;">Séance</th>
                                                            <th style="text-align: center;margin-left:0;">Date</th>
                                                            <th style="text-align: center;margin-left:unset;">justifiee</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php while($res = mysqli_fetch_assoc($run1)){
                                                                $matiere = $res['libelle'];$seance=$res['Seance'];
                                                                $justifiee = $res['justifiee'];$comm_abs= $res['comm_abs'];
                                                                ?>
                                                        <tr>
                                                            <td style="text-align: center;margin-left:0;"><?php echo $matiere;?></td>
                                                            <td style="text-align: center;margin-left:0;"><?php echo $seance;?></td>
                                                            <td style="text-align: center;margin-left:0;"><?php echo $comm_abs;?></td>
                                                            <td style="text-align: center;margin-left:0;"><?php echo $justifiee;?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </li>
                                    </ul>
                                <?php }else{?>
                                    <ul class="collection">
                                        <li class="collection-item">
                                            <div class="center">
                                                <span style="color:red;">Aucune Absence</span>
                                            </div>
                                        </li>
                                    </ul>
                                <?php } ?>
                            </div>
                    <?php } ?>
                        
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