<!DOCTYPE html>
<html lang="fr">
<head>
    <!--<meta charset="UTF-8">
    Import Google Icon Font
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link href="../fonts/material-icons/icofonts/material-icons.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.svg" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        .input-field input:focus + label {
            color: #526Fd7 !important;
        }
        i {
            color : #526Fd7;
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
  </head>
  <?php
    session_start();
  ?>
