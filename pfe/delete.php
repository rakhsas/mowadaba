<?php


require_once('../include/dbcon.php');


if(isset($_POST['idd']))
{
     $sql = "delete FROM pfe WHERE id_pfe =".$_POST['idd'];
     mysqli_query($con,$sql);
	 echo 'Deleted successfully.';
}


?>