<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
$id = $_SESSION['uid'];
$ecole = $_SESSION['ecole'];
?>



      <!-- The Coding Has Been Started From Here -->

      <nav class="" style="background-color:#526Fd7;">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Ajouter Classe</a>
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


<?php
if(isset($_FILES['excel']['name'])){
    $uploads_dir = '../uploads';
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["excel"]["name"]);
        if (!file_exists("$uploads_dir/$name")) {
            if (mkdir( $path_user,0777,false )) {
            }
        } else {
            unlink("$uploads_dir/$name");
        }       
        if(move_uploaded_file($_FILES["excel"]["tmp_name"], "$uploads_dir/$name")){
		};
  if(isset($_POST['submit'])){
      
      
      function FF(){
        /*$standerd = $_POST['standerd'];
        $yearnow = date("Y");
        $sd = substr($yearnow,0);
        $yearnow = intval($sd);
        $array = array(1=>$yearnow-1,2=>$yearnow,3=>$yearnow,4=>$yearnow+1);
        $y1 = $array[1] ."/". $array[2];
        $y2 = $array[3] ."/". $array[4];
        if($standerd % 2 == 0){
          return $y2;
        }else{
          return $y1;
        }*/
        return '2022/2023';
      }
  }
    
  
	
    
	include "../xlsxfile/xlsx.php";
     
	if($con){
	    
require_once "Classes/PHPExcel.php";
$path="$uploads_dir/$name";
echo "<script type='text/javascript'>alert('$path');</script>";
$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);
 
//Get the last sheet in excel
//$worksheet=$excel_Obj->getActiveSheet();
for($sh=0;$sh<5;$sh++){
//Get the first sheet in excel
$worksheet=$excel_Obj->getSheet($sh);
/*$stander=$worksheet->getCell('N14')->getValue();
echo "<script type='text/javascript'>alert('$A3');</script>";*/
$row111=14;
$stander=$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex(13).$row111)->getValue();
$lastRow = $worksheet->getHighestRow();
$colomncount = $worksheet->getHighestDataColumn();
$colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
echo $lastRow.'     ';
echo $colomncount;
echo "<table border='1'>";
	for($row=18;$row<=$lastRow;$row++){
	    $q="";
		echo "<tr>";
		for($col=1;$col<=14;$col++){
			echo "<td>";
			if($col==1 || $col==2 ||$col==5 ||$col==6 || $col==11 ||$col==14 ){
			//echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
			$cell=$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
			if($col==5)$cell=$stander;
			$q.="'".$cell. "'";
			echo $q;
			echo "</td>";
			if($col<14)	$q.=",";
			}
		}
		$query="INSERT INTO `students` (`ideleve`,`rollno`,`standerd`,`fstname`,`lstname`,`gender`)values (".$q.");";
		echo "<script>alert('$query');</script>";
		if(mysqli_query($con,$query))
			{
                $pass1= "UPDATE students SET email = rollno ,password = rollno,token = md5(rollno)";
            }
            if(mysqli_query($con,$pass1)){
                $pass2 = "update students set gender = 'Homme' where gender like '%Gar%'";
            }
            if(mysqli_query($con,$pass2)){
               $p3 = "update students set gender = 'Femme' where gender like '%Fille%'";
            }      
            if(mysqli_query($con,$p3)){
                
            }
		echo "</tr>";
		
	}	
echo "</table>";
}
        
        /*
        //echo "<script>alert('$excel');</script>";
        $excel=SimpleXLSX::parse("$uploads_dir/$name");
		//print_r($excel->rows(1));
		//print_r($excel->dimension(2));
		//print_r($excel->sheetNames());
        for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
        $rowcol=$excel->dimension($sheet);
        $i=0;
        //$requery = "drop table ".$excel->sheetName($sheet)."";
        //if(mysqli_query($con,$requery)){}

        if($rowcol[0]!=1 &&$rowcol[1]!=1){
		foreach ($excel->rows($sheet) as $key => $row) {
			//print_r($row);
			$q="";
			foreach ($row as $key => $cell) {
				//print_r($cell);echo "<br>";
				if($i==0){
					$q.=$cell. "` varchar(50),`";
				}else{
					$q.="'".$cell. "',";
					//echo $q;
				}
			}
      
			if($i==0){
				//$query="CREATE table ".$excel->sheetName($sheet)." (`".rtrim($q,",`").");";
        //$query="INSERT INTO `students` (`Nom`,`Prenom`,`Code`,`DateNaissance`) values (".rtrim($q,",").");";
        //$query="INSERT INTO `students` (`ideleve`,`rollno`,`standerd`,`fstname`,`lstname`,`gender`,`DateNaissance`,`Lieu de Naissance`,`AnneeScolaire`) values (".rtrim($q,",").",'".FF()."');";
                $query="INSERT INTO `students` (`ideleve`,`rollno`,`standerd`,`fstname`,`lstname`,`gender`,`DateNaissance`,`Lieu de Naissance`,`AnneeScolaire`) values (".rtrim($q,",").",'".FF()."');";

			}else{
        //$query="INSERT INTO `students` (`ideleve`,`rollno`,`standerd`,`fstname`,`lstname`,`gender`,`DateNaissance`,`Lieu de Naissance`,`AnneeScolaire`) values (".rtrim($q,",").",'".FF()."');";
                $query="INSERT INTO `students` (`ideleve`,`rollno`,`standerd`,`fstname`,`lstname`,`gender`,`DateNaissance`,`Lieu de Naissance`,`AnneeScolaire`)values (".rtrim($q,",").",'".FF()."');";

			}
			
			if(mysqli_query($con,$query))
			{
                $pass1= "UPDATE students SET email = rollno ,password = rollno,token = md5(rollno)";
            }
            if(mysqli_query($con,$pass1)){
                $pass2 = "update students set gender = 'Homme' where gender like '%Gar%'";
            }
            if(mysqli_query($con,$pass2)){
               $p3 = "update students set gender = 'Femme' where gender like '%Fille%'";
            }      
            if(mysqli_query($con,$p3)){
                
            }
            
			echo "<br>";
			$i++;
		}
    
    
	  }
		}*/
	}   
    $class = "select distinct(standerd) from students";
    $run = mysqli_query($con, $class);
    if(mysqli_num_rows($run) > 0){
        while ($data = mysqli_fetch_assoc($run)){
            $stand = $data['standerd'];
            $q1 = "insert into classes (nom) values('".$stand."');";
            mysqli_query($con,$q1);
        }
    }
}

?>