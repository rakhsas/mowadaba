<?php
    
    require('conex.php');
    session_start();
    $id = $_SESSION['FkId'];
    $result =mysqli_query($conn,"SELECT * FROM pfe WHERE FkUser = $id");
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>