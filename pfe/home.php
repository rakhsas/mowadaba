<?php
        session_start();

        if(isset($_SESSION['uid']))
        {
            $teacher_id = $_SESSION['uid'];
        }
        else{
        header("location:../index.php");
        }
        
    require_once('../include/dbcon.php');
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="description" content="">
        <meta charset="utf-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!--<meta name="format-detection" content="telephone=no">-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
        <link rel="shortcut icon" type="image/x-icon" href="../../images/logo.svg" />
        <!--<link rel="stylesheet" href="dist/css/demo.css">-->
        <link rel="stylesheet" href="../dist/css/dropify.min.css">
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                   
        <style>
        header, .main, footer {
          padding-left: 300px;
        }
    
        @media only screen and (max-width : 992px) {
          header, .main, footer {
            padding-left: 0;
          }
        }
        textarea.input-textarea{height: 6rem;}
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
                .remove{
    background-color: transparent;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    overflow: hidden;
    outline: none;

                }
                .editor{
    background-color: transparent;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    overflow: hidden;
    outline: none;

                }
    </style>
    </head>
    <body>
      <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <!--<a href="" class="brand-logo left hide-on-med-and-down" style="margin-left: 115px;display: table;"><h6></h6></a>-->
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Ajout de sujet</a>
                    <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
                </div>
            </div>
        </nav>
        <div class="row main">
            <div class="col l12 m12 s12">
    <?php
 if(isset($_GET['idpfed'])){
      $idpfe=$_GET['idpfed'];
      mysqli_query($con,"delete FROM pfe WHERE id_pfe = $idpfe");
 }
  if(isset($_GET['idpfe'])){
      $idpfe=$_GET['idpfe'];
     // echo "<script>alert(\"la variable est nulle $idpfe \")</script>";
    $result =mysqli_query($con,"SELECT * FROM pfe WHERE id_pfe = $idpfe");
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($projects as $value){
        $titre=$value['titre'];
       // echo "<script>alert(\"la variable est nulle $titre \")</script>";
        $filier=$value['filiere'];
        $description=$value['description'];
        $files=$value['fichier'];
    }
  }
if(isset($_POST['submit']) && !empty($_POST['submit'])) {
    echo "bien";
  // if (!logged_in()) 
//echo "<script>alert('Votre projet a ete pose avec succès.')</script>";
  $inserted=1;
  if (isset($_REQUEST['titre'], $_REQUEST['filiere'], $_REQUEST['description'])){
      echo 'asodj2';
    $titre = ($_REQUEST['titre']);

    //
    $filiere = ($_REQUEST['filiere']);
    //
    $description = ($_REQUEST['description']);
    
    //
    $idFK = $_SESSION['uid'];
   if(!isset($_REQUEST['mod'])){
       //echo "<script>alert('$titre')</script>";
      $requete = "INSERT into `pfe` (titre, filiere, description,FkUser)
                VALUES ('$titre', '$filiere', '$description','$idFK')";
    // Exécuter la requête sur la base de données
      $res = mysqli_query($con, $requete);
      if($res){
          $inserted= $con->insert_id;
         echo "<script>alert('Votre projet a ete pose avec succès.')</script>";
      }
      else echo 'TEST' . mysql_error();
  //l envoi du fichier
  if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0)  {

    if ($_FILES['fichier']['size'] <= 6000000) {
         $infoFichier = pathinfo($_FILES['fichier']['name']);
         $extextentionFichier = $infoFichier['extension'];
         $extextentionArray = array('pdf', 'rar', 'docx', 'zip');
    
      if (in_array($extextentionFichier, $extextentionArray)) {
          $fil='upload/'.time().rand().rand().'.'.$extextentionFichier;
            $requete1 ="UPDATE pfe SET fichier = '$fil' WHERE id_pfe = '$inserted'";
            mysqli_query($con, $requete1);
          move_uploaded_file($_FILES['fichier']['tmp_name'], $fil);
         
      }
    
    }
  }
}else{
        $fil="#";
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0)  {

    if ($_FILES['fichier']['size'] <= 6000000) {
         $infoFichier = pathinfo($_FILES['fichier']['name']);
         $extextentionFichier = $infoFichier['extension'];
         $extextentionArray = array('pdf', 'rar', 'docx', 'zip');
    
      if (in_array($extextentionFichier, $extextentionArray)) {
          $fil='upload/'.time().rand().rand().'.'.$extextentionFichier;
          move_uploaded_file($_FILES['fichier']['tmp_name'], $fil);
         
      }
    
    }
  }
   $requete = "UPDATE `pfe` SET `titre` = '$titre', `filiere` = '$filiere', `FkUser` = '$idFK', `description` = '$description', `fichier` = '$fil' WHERE `pfe`.`id_pfe` = $idpfe";
             //   VALUES ('$titre', '$filiere', '$description','$idFK')";
    // Exécuter la requête sur la base de données
      mysqli_query($con, $requete); 
}
}
    header('Location: home.php');
//submit
}else{
 ?>
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-panel">
                <div class="center">
                <?php if(isset($teacher_updated)){?>
                <h5 class="center" style="color:#4BB543"><?php echo $teacher_updated; 
              }?>
              <?php if(isset($teacher_updated_failed)){?>
                <h5 class="center red-text"><?php echo $teacher_updated_failed; 
              }?>
              

            </h5></div>
                    <div class="row">
                        <div class="col l5 center">
                            <div class="input-field">
                                <i class="material-icons prefix">title</i>
                                <input type="text" name="titre" id="titre" <?php if(isset($_GET['idpfe'])){ ?> value=" <?php echo $titre; ?>" <?php }?> required="required" >
                                <label for="titre">Le titre du sujet :</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">low_priority</i>
                                <select id="dropdown" placeholder="l'option" name="filiere">
                                <!--<option disabled selected hidden>Choisissez </option>-->
                                <option value="1" <?php if(isset($_GET['idpfe'])){ if($filier==1){ ?>selected="selected" <?php  }}?>>DSI</option>
                                <option value="2" <?php if(isset($_GET['idpfe'])){ if($filier==2){ ?>selected="selected" <?php  }}?>>RSI</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">description</i>
                                    <textarea id="description" class="input-textarea" name="description" rows="10" placeholder="Plud de detail sur le projet.."><?php if(isset($_GET['idpfe'])){ echo $description;  }?></textarea>
                                <!--<label for="description">Description</label>-->
                            </div>

                            
                            <div class="file-field input-field">
                              <div class="btn">
                                <span>File</span>
                                <input id="fichier" type="file" name="fichier" multiple>
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Cahier des charges (pdf ou word)" <?php if(isset($_GET['idpfe'])){ ?> value=" <?php echo $files; ?>" <?php }?>>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col s15 center">
                            
                            
                        </div>
                        <div class="col l5 center">
                        <?php if(isset($_GET['idpfe'])){?>
                    <input id="mod" name="mod" type="hidden" value="xm234jq">
                    <?php } ?>
                        <!--</div>
                        <div class = "row">
                            <div class="col l6 center">-->
                               
                            </div>
                        </div>
           
                    </div>
                    
                    <div class="center">
                    <input id="envoyer" type="submit" name="submit" value="Ajouter" style="width:auto;background-color:#FF8000;" class="btn">
                </div>
      
              </form>
              </div>
                </div>
                
<?php 
    
} 
//WHERE FkUser = $teacher_id
$result =mysqli_query($con,"SELECT * FROM pfe ,teacher WHERE pfe.FkUser=teacher.id");
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
?>
            
  <div class="row main">
      <div class="col l12 m12 s12">
       <table class="table striped">
  <thead>
    <tr>
        <th>Num</th>
      <th>Titre</th>
      <!--<th>Détail</th>-->
       <th>Professeur</th>
      <th>Filière</th>
     
      <!--<th>Fichier</th>
      <th>Actions</th>-->
    </tr>
  </thead>

  <tbody> <?php  foreach($projects as $value): ?>
<tr  idd="<?php echo $value['id_pfe']; ?>" <?php if($value['filiere']=="1"){?> style="background: #CEFDF9"<?php } ?>>
    <td><?php echo $value['id_pfe']?></td>
    <td><?php echo $value['titre']?></td>
    <td><?php echo $value['name']//echo $value['description']?></td>
    <td><?php if( $value['filiere']=="1"){        echo"DSI";                            }else                            echo"RSI";                           ?></td>

<!--<td><a href="<?php //echo $value['fichier']?>"><i class="material-icons" style="color:red;">picture_as_pdf</i></a></td>
<td>
<a href="home?idpfe=<?php //echo $value['id_pfe'] ;?>" class="editor"><i class="material-icons" style="color:green;">edit</i></a>
 <button class="remove"><i class="material-icons" style="color:red;">delete</i></button>

</td>-->
</tr>
<?php  endforeach; ?>
  </tbody>
</table>
</div>
  </div>
        
        
       
        
        
        

        <?php 
require_once('../include/sidenav.php');
?>
        <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
        <script src="../dist/js/dropify.min.js"></script>
        <script>
            $(document).ready(function(){
                // Basic
                $('select').formSelect();
                $('.sidenav').sidenav();
                $('.collapsible').collapsible();
                $('.tooltipped').tooltip({delay: 50});
                $('.dropdown-trigger').dropdown();
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
            $(document).ready(function(){
                
            });
            

        </script>
         <script type="text/javascript">
    $(".remove").click(function(){
        var idd = $(this).parents("tr").attr("idd");
        alert(idd);

        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete.php',
               type: 'POST',
               data: {idd: idd},
               success: function(data) {
                    //$("#"+idd).remove();
                    $(this).remove();
                    alert("Record removed successfully");  
                    location.reload();
               },
               error: function() {
                  alert('Something is wrong');
               }
               
            });
        }
    });


</script>
    </body>
</html>

