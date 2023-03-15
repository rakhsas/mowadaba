<?php session_start(); ?>
  <!-- Session Checking -->
  <?php
if(isset($_SESSION['student_id']))
{

}
else{
  header("location:login");
}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
    <!--Import Google Icon Font
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    
    <link href="../../fonts/material-icons/icofonts/material-icons.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="../dist/css/demo.css"> 
    <link rel="stylesheet" href="../dist/css/dropify.min.css">
    <link rel="stylesheet" href="css1/demo.css">
        <link rel="stylesheet" href="css1/dropify.min.css">-->
        <link rel="shortcut icon" type="image/x-icon" href="../images/logo.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo "Welcome " . $_SESSION['student_name']; ?></title>
  </head>
  <style>
        header, .mufazmi, footer {
        padding-left: 300px;
      }
  
        @media only screen and (max-width: 992px) {
            header,
            .mufazmi,
            footer {
                padding-left: 0;
            }
        }
        .input-field input:focus + label {
            color: #526Fd7 !important;
        }
        
        /* label underline focus color */
        input:focus {
            border-bottom: 1px solid #526Fd7 !important;
            box-shadow: 0 1px 0 0 #526Fd7 !important
        }
        .input-field .prefix{
            color:black;
        }
        .input-field .prefix.active{
            color:#526Fd7;
        }
    </style>
  <body bgcolor="#ececec">