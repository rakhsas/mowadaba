<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style2.css" />
</head>
<body>
<?php
require('conex.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM teacher where 
              email = '".$username."' and password = '".$password."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $row = mysqli_fetch_array($result);
  if($row){
    $_SESSION['username'] = $username;
    print_r($row);
    $_SESSION['FkId'] = $row['id'];
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<div id="container">
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<label><b>Email</b></label>
<input type="text" class="box-input" name="username" placeholder="Entre Ton Email">
<label><b>Mot de passe</b></label>
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</div>
</body>
</html>