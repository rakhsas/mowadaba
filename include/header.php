<!DOCTYPE html>
<html lang="fr">
  <head>
     <!-- <meta charset="UTF-8">
    Import Google Icon Font
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link href="../fonts/material-icons/icofonts/material-icons.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection"/>
    <!-- Dropify File Upload -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="../dist/css/demo.css"> -->
    <link rel="stylesheet" href="../dist/css/dropify.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.svg" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        header, .main, footer {
          padding-left: 300px;
        }
    
        @media only screen and (max-width : 992px) {
          header, .main, footer {
            padding-left: 0;
          }
        }
                .input-field input:focus + label {
                    color: #526Fd7 !important;
                }
                i {
                    color : white;
                }
                /* label underline focus color */
                input:focus {
                    border-bottom: 1px solid #526Fd7 !important;
                    box-shadow: 0 1px 0 0 #526Fd7 !important
                }
                .material-icons:focus !important {
                    color: #526Fd7;
                }
                ul.dropdown-content.select-dropdown li span {
                    color: #526Fd7; /* no need for !important :) */
                }
                [type="radio"]:checked + span:after,
                [type="radio"].with-gap:checked + span:before,
                [type="radio"].with-gap:checked + span:after {
                    border : 2px solid #526Fd7;
                }
                [type="radio"]:checked + span:after,
                [type="radio"].with-gap:checked + span:after {
                    background-color: #526Fd7 ;
                }
                .input-field .prefix{
                    color:black;
                }
                .input-field .prefix.active{
                    color:#526Fd7;
                }
    </style>
    
  </head>
  <body>
  <?php
    session_start();
  ?>

  <!-- Session Checking -->
<?php
if(isset($_SESSION['uid']))
{

}
else{
  header("location:../index.php");
}

?>