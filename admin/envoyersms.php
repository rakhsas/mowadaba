<script>
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    window.location = "absjourmob.php";
}

</script>
<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');
$ecole=$_SESSION['ecole'];

$query = "SELECT * FROM `absence` WHERE `justifiee`='Non' and comm_abs =  DATE(NOW())";
$run = mysqli_query($con,$query);
    if(isset($_POST['submit'])) {

        if(mysqli_num_rows($run) > 0) {
            while($row = mysqli_fetch_assoc($run)) {
                $idel = $row['rollno'];//echo "<script>alert('".$idel."')</script>";
                if(isset($_POST[$idel])) {
                                            
                    $qer= "update absence set `justifiee` = 'oui' where rollno = '$idel'";
                    $r = mysqli_query($con, $qer);
                    header ('Location:AbsJour.php');
                    //if () {}
                    //echo "<script>document.location.reload(true);</script>";
                    //header("refresh: 0");?><script>
                    
    reload_interval(0000);
                    </script><?php
                }
            }
        }
    }
                function send_sms($num, $texte) {
                    $url = 'https://bulksms.ma/developer/sms/send';
                 
                    $fields_string = 'token=7DpOClnihO2cpaEIS5wT8rNg1&tel=' . $num . '&message=' . urlencode($texte);
                    
                    $ch = curl_init();
                 
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                 
                    $result = curl_exec($ch);
                 
                    curl_close($ch);
                    return $result;
                }
    if(isset($_POST["send"])){
        $name = "Abdelhak Fadili";
        $date = "2022-05-26";     $matiere = "DAI";
        

                        $hell = " مؤسسة عبدالرحمان ابن غزالة تخبركم ان التلميذ (ة)".' '.$name.' '."قد تغيب (ة) يوم".' '.$date.' '." عن حضور حصة".' '.$matiere.' '." المرجو التواصل مع الادارة عاجلا.";

                        
                        echo send_sms("0673697101",$hell);
                      


    }

?>
      <!-- The Coding Has Been Started From Here -->

        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Absence du jour</a>
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="striped">
                                <tr  class="class" style="background-color: #fff; width:auto;color:#526Fd7;">
                                    
                                    <!--<th style="text-align: center;margin-left:0;">Image</th>-->
                                    <th style="text-align: center;margin-left:0;">CNE</th>
                                    <th style="text-align: center;margin-left:0;">Nom et Prenom</th>
                                    <th style="text-align: center;margin-left:unset;">Classe</th>
                                    <th style="text-align: center;margin-left:0;">justifier?</th>
                                    <th style="text-align: center;margin-left:0;">Sms</th>
                                </tr>
                                
                                    <?php
                                    $count=0;
                                    while($data = mysqli_fetch_assoc($run)){
                                            $count++;
                                            $idcl = $data['idclasse'];
                                            $rollno = $data['rollno'];
                                            $idMatiere = $data['idMatiere'];
                                            //dfgdfghgf fhmti test  
                                            $r1 = mysqli_fetch_assoc(mysqli_query($con,"select nom from classes where idclasse = $idcl"));
                                            $nomclass = $r1['nom'];
                                            $r2 = mysqli_fetch_assoc(mysqli_query($con,"select * from students where standerd='$nomclass' and rollno='$rollno'"));
                                            $image = $r2['image'];$fstname = $r2['fstname'];$lstname = $r2['lstname'];
                                            $r3 = mysqli_fetch_assoc(mysqli_query($con,"select libelle from matier where idMatiere= $idMatiere"));
                                            $libelle = $r3['libelle'];
                                    ?><tr>
                                    <!--<td style="text-align: center;"> <img src="../img/<?php
                    if(isset($image) && !empty($image)){echo $image;}else{echo 'user.png';}?>" class="responsive-img circle" style="width: 100px;"> </td>-->
                                                            <td style="text-align: center;"><?php echo $rollno; ?></td>
                                        <td style="text-align: center;"><?php echo $fstname .' '.$lstname ; ?></td>
                                        <td style="text-align: center;"><?php echo $nomclass; ?></td>

                                        <!--<td name="rr" value=<?php echo $idel; ?> hidden></td>-->
                                        <td style="text-align: center;">
                                            <p>
                                                <label>
                                                    <input id="indeterminate-checkbox" type="checkbox" name= "<?php echo $rollno; ?>"/>
                                                    <span></span>
                                                </label>
                                            </p>
                                        </td>
                                        <td style="text-align: center;">
                                            <p>
                                                <label>
                                                    <input id="indeterminate-checkbox" type="checkbox" name= "<?php echo $rollno; ?>"/>
                                                    <span></span>
                                                </label>
                                            </p>
                                        </td>
                                        </tr>
                                        
                                <?php } ?>
                                <input type="text" name = "count" value="<?php echo $count; ?>" hidden>
                            </table>
                            <div class="row">
                                <div class ="center">
                                    <button type="submit" name="submit" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">Enregistrer</button>
                                
                                    <button type="submit" name="send" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">Envoyer</button>
                                </div>
                            </div>
                            
                        </form>
                        <?php


                            
                            ?>
                    </li>
                    </ul>
                </div>
            </div>
        </div>

      <!-- The Navbar Menu Collection List -->
<?php

//require_once('../include/sidenavadmin.php');
?>

<script>
    function reload_interval(time){
        setTimeout(function(){
            location.reload();
        }, time);
    }
    </script>
<?php
require_once('../include/footer.php');
?>