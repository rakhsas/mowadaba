<script>
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    window.location = "absjourmob.php";
}

</script>
<?php
function send_sms($num, $texte, $emetteur) {
    $url = 'https://bulksms.ma/developer/sms/send';
 
    $fields_string = 'token=7DpOClnihO2cpaEIS5wT8rNg1&tel=' . $num . '&message=' . urlencode($texte). '&shortcode=' . $emetteur;
    
    $ch = curl_init();
 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
 
    $result = curl_exec($ch);
 
    curl_close($ch);
    return $result;
}

require_once('../include/dbcon.php');
require_once('../include/header.php');
$ecole=$_SESSION['ecole'];

$query = "SELECT * FROM `absence` WHERE `justifiee`='Non' and comm_abs =  DATE(NOW()) and Etat_Sms = 0";
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
                /*function send_sms($num, $texte) {
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
            function send_message ( $post_body, $url, $username, $password) {
                  $ch = curl_init( );
                  $headers = array(
                  'Content-Type:application/json',
                  'Authorization:Basic '. base64_encode("$username:$password")
                  );
                  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                  curl_setopt ( $ch, CURLOPT_URL, $url );
                  curl_setopt ( $ch, CURLOPT_POST, 1 );
                  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
                  curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
                  // Allow cUrl functions 20 seconds to execute
                  curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
                  // Wait 10 seconds while trying to connect
                  curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
                  $output = array();
                  $output['server_response'] = curl_exec( $ch );
                  $curl_info = curl_getinfo( $ch );
                  $output['http_status'] = $curl_info[ 'http_code' ];
                  $output['error'] = curl_error($ch);
                  curl_close( $ch );
                  return $output;
                } */
    if(isset($_POST["send"])){
        
                        
        if(mysqli_num_rows($run) > 0) {
            while($row1 = mysqli_fetch_assoc($run)) {
                $idel1 = $row1['rollno'];//echo "<script>alert('".$idel."')</script>";
                if(isset($_POST[$idel1])) {
                    $qer= mysqli_fetch_Assoc(mysqli_query($con,"SELECT students.fstname,students.lstname,matier.libelle,absence.comm_abs,students.Numero_Parent FROM `students`,absence,matier WHERE students.rollno='R120034031' and students.rollno=absence.rollno and absence.idMatiere=matier.idMatiere limit 1 "));
                    $name= $qer['fstname'].' '.$qer['lstname'];$roll = $qer['rollno'];
                    $date = $qer['comm_abs'];$matiere = $qer['libelle'];$tel= $qer['contact'];
                    $hell = " مؤسسة عبدالرحمان ابن غزالة تخبركم ان التلميذ (ة)".' '.$name.' '."قد تغيب (ة) يوم".' '.$date.' '." عن حضور حصة".' '.$matiere.' '." المرجو التواصل مع الادارة عاجلا.";
                    //send_sms("0673697101", "Mon Message", "MySenderID");
                   /* $username = 'fadili101';
                    $password = 'Ibnghazala1';*/
                    $messages = array(array('to'=>'+212'.substr($tel,1), 'body'=>$hell));  
                   // $result = send_message( json_encode($messages), 'https://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30', $username, $password );
                   echo "<script>alert('$name')</script>";
                    if(send_sms("0673697101", "Mon Message", "MySenderID")){
                        mysqli_query($con,"update absence set Etat_Sms = 1 where rollno = '$roll'");
                    }
                    /*if ($result['http_status'] != 201) {
                       //print "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status ".$result['http_status']."; Response was " .$result['server_response']);
                    } else {
                       //print "Response " . $result['server_response'];
                        if(mysqli_query($con,"update absence set Etat_Sms = 1 where rollno = '$roll'")){
                        }
                       
                    }*/
                                            
            }
        }   

}
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

require_once('../include/sidenavadmin.php');
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