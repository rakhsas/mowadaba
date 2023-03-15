<?php
// Informations d'identification

define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'mowadaba_p');
define('DB_PASSWORD', 'IbnGhazala2017');
define('DB_NAME', 'mowadaba__sms');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}else{
   
}


?>