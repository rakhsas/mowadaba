<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
$id = $_SESSION['uid'];
$ecole = $_SESSION['ecole'];

    if(isset($_POST['submit'])){
        if (isset($_FILES['excel']['name'])) {
            include "../xlsxfile/xlsx.php";
     
	if($con){
        
        
        //echo "<script>alert('$excel');</script>";
        $excel=SimpleXLSX::parse("$uploads_dir/$name");
    			for ($sheet = 0; $sheet < sizeof($excel->sheetNames()); $sheet++) {
    				$rowcol = $excel->dimension($sheet);
    				$i = 0;
    				if ($rowcol[0] != 1 && $rowcol[1] != 1) {
    					$col = $excel->rows($sheet);
    					//recuperer la classe
    					$classe = $col[5][6];
    					$req = "INSERT INTO classes (nom) VALUES ('" . $classe . "')";
    					mysqli_query($con, $req);
    					//recuperer l'indice de la classe ajouter
    					$idCls = mysqli_insert_id($con);
    					foreach ($excel->rows($sheet) as $key => $row) {
    						if ($i >= 9) {
    							$rElv = $row[2];
    							$NomElv = $row[3];
    							$PrenomElv = $row[4];
    							$CINP = $row[6];
    							$NomP = $row[9];
    							$PrenomP = $row[10];
    							$TelP = $row[12];
    							$CINM = $row[22];
    							$NomM = $row[25];
    							$PrenomM = $row[26];
    							$TelM = $row[28];
    							//ajouter les parents dans la base de données
    							$req = " INSERT INTO `parent` (`CinP`, `NomP`, `PrenomP`, `TelP`, `CinM`, `NomM`, `PrenomM`, `TelM`) 
    							VALUES ('$CINP','$NomP','$PrenomP','$TelP','$CINM','$NomM','$PrenomM','$TelM')";
    							mysqli_query($con, $req);
    							//recuperer l'indice du parent ajouter
    							$idP = mysqli_insert_id($con);
    							//ajouter les eleves
    							$req = "INSERT INTO `eleve`(`CodeMassarElv`, `Nomelv`, `PrenomElv`, `IdCls`, `IdP`) 
    							VALUES ('$rElv','$NomElv','$PrenomElv','$idCls','$idP')";
    							mysqli_query($con, $req);
    						}
    						$i++;
    					}
    				}
    			}
    		}
        }
    }
?>
      <!-- The Coding Has Been Started From Here -->

      <nav class="" style="background-color:#526Fd7;">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Parents</a>
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
                <div class="row">
                  <div class="col l4 m12 s12 center">
                    <div class="input-field file-field">
                      <div class="dropify-wrapper">
                        <div class="dropify-message">
                            <p>Drag and drop a file here or click</p>
                        </div>
                        <div class="dropify-loader"></div>
                        <div class="dropify-errors-container">
                            <ul></ul>
                        </div>
                        <input type="file" name="excel" class="dropify" data-show-remove="false">
                        <div class="dropify-preview">
                            <span class="dropify-render"></span>
                            <div class="dropify-infos">
                                <div class="dropify-infos-inner">
                                    <p class="dropify-filename">
                                        <span class="file-icon"></span>
                                        <span class="dropify-filename-inner"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="input-field">
                        <?php
                        $yearnow = date("Y");
                        $sd = substr($yearnow,0);
                        $yearnow = intval($sd);
                        $array = array(1=>$yearnow-1,2=>$yearnow,3=>$yearnow,4=>$yearnow+1);
                        $y1 = $array[1] ."/". $array[2];
                        $y2 = $array[3] ."/". $array[4];
                        ?>
                        <select name="standerd" required="required">
                          <option value="">Année Scolaire</option>
                          <option value="1"><?php echo $y1;?></option>
                          <option value="2"><?php echo $y2; ?></option>
                        </select>
                      </div>
                    <button type="submit" name="submit" style="width:auto;border-radius: 5px;background-color:#FF8000;" class="btn">Ajouter Classe</button>
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
