<body>
<center>
<h2>Read Excel By PHPExcel</h2>
<?php
require_once "Classes/PHPExcel.php";
$path="Classeur2.xls";
$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);
 
//Get the last sheet in excel
//$worksheet=$excel_Obj->getActiveSheet();
 
//Get the first sheet in excel
$worksheet=$excel_Obj->getSheet('0');
echo $worksheet->getCell('A1')->getValue()."<br>";
echo $worksheet->getCell('A2')->getValue()."<br>";
echo $worksheet->getCell('A3')->getValue()."<br>";
$lastRow = $worksheet->getHighestRow();
$colomncount = $worksheet->getHighestDataColumn();
$colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
echo $lastRow.'     ';
echo $colomncount;
echo "<table border='1'>";
	for($row=2;$row<=$lastRow;$row++){
		echo "<tr>";
		for($col=0;$col<=$colomncount_number-1;$col++){
			echo "<td>";
			echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
			echo "</td>";
		}
		echo "</tr>";
	}	
echo "</table>";
?>
</center>
</body>
</html>