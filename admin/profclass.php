<?php
require_once('../include/header.php');?>
<?php
function base64_url_decode($input) {
 return base64_decode(strtr($input, '._-', '+/='));
}
function base64_url_encode($input) {
    return strtr(base64_encode($input), '+/=', '._-');
}
$student_id = $_GET['nom'];
$decoded = base64_decode($student_id);
if(isset($decoded)){
    //echo"<script>alert($decoded)</script>";
}
else
{
   //echo"<script>alert($decoded)</script>";
  header("location:dashboard.php");
}
?>

<?php

require_once('../include/dbcon.php');

$student_id = $_GET['id'];
$de = str_rot13(str_rot13($standerd));


?>

<?php

if(isset($_POST['submit'])) {
    //$teacherMatiere = array();
    $teacherArr = [];
    $matiereArr = [];
    $rst = mysqli_query($con,"SELECT idMatiere FROM `matier`");
    while($slt = mysqli_fetch_assoc($rst)){
        $matiere = $slt['idMatiere'];
        $teacher = $_POST["$matiere"];
        array_push($matiereArr, $matiere);
        array_push($teacherArr, $teacher);
    }
    $var_M = count($matiereArr);
    //var_T(count($teacherArr));
    $idclasse = "SELECT idclasse FROM `classes` where nom like '%$decoded%'";
    $qq = mysqli_query($con,$idclasse);
    $rw = mysqli_fetch_assoc($qq);
    $a = $rw['idclasse'];
    for ($i=0;  $i < $var_M; $i++){
        $qry = "insert into `class_teacher` values (".$a.",".$matiereArr[$i].",".$teacherArr[$i].")";
        $insert = mysqli_query($con,$qry);
        if($insert)
    {
        $_SESSION['classes affecté'] = "classes affectées avec succès";
        $student_added =  $_SESSION['classes affecté'];
    }
    else{

      $_SESSION['classes pas affecté'] = "echec";
      $student_added_failed =  $_SESSION['classes pas affecté'];
     }
    }
}
?>
      <!-- The Coding Has Been Started From Here -->

      <nav class="" style="background-color:#526Fd7;">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center" style="margin-left: 115px;">Affecter Matieres</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
          </div>
        </div>
      </nav>


      <!-- The Dashboard Coding Started From Here 
      &nbsp;&nbsp;&nbsp;&nbsp;-->
        <div class="row main">
            <div class="col l12 s12 m12">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-panel">
                    <div class="center">
                        <h5 class="center red-text"><?php 
              
                            if(isset($student_added)){
                                echo $student_added; 
                            }?>
                        </h5>
                        <h3><?php echo $decoded ?></h3>
                  </div>
                    <?php
                                $rst = mysqli_query($con,"SELECT idMatiere,libelle FROM `matier`");
                                $i = 0;
                                while($slt = mysqli_fetch_assoc($rst)){
                                    $s = $slt['libelle'];
                                    $query = "select id,name from teacher t, matier m where t.idMatier = m.idMatiere and libelle like '$s%' ;";
                                    $res = mysqli_query($con,$query);
                                    $i++;
                                ?>
                <div class="row" style="align-items:center;">
                    <div class="col s7 left" style="display:table;">
                        <div class="input-field" style="height:71px;display:table-cell;vertical-align:middle;">
                            
                            <span><?php echo $slt['libelle'];?></span>
                        </div>
                    </div>
                    <div class="col s5 right">
                        <div class="input-field">
                            <select  name="<?php echo $slt['idMatiere'] ;?>">
                                <option value="" disabled selected>Professeur </option>
                                <?php
                                    while ($j = mysqli_fetch_assoc($res)){ ?>
                                    <option value="<?php echo $j['id'];?>"><?php echo $j['name'];?></option>
                                <?php }  ?>
                                
                            </select>
                        </div>
                    </div>
                    
                </div>
                <?php }?>
                <div class="center">
                        <button type="submit" name="submit" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">Enregistrer</button>
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