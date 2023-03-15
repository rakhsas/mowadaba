<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
   <style>
.button {
  background-color: #555555;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
     .button:hover{
        background-color: #888;
        color: white;
     }
     .titre-projet{
         color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 35px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;
     }
     
     
    </style>
  </head>
  <body >
  <?php include("src/header.php")?>
</br>

<main class="d-flex flex-column">
        <div class=" shadow p-3 mb-5 bg-body rounded w-100 container mt-5" >
            <div class="d-flex justify-content-between" >
                <p class="titre-projet">Les sujets : </p> 

                <div class="positionadd">
                <span>
                        <i class="fas fa-search"></i>
                    </span>
                    
                </div>
            
                
      
                <!-- modal -->
                
            </div>
                <div class="table-responsive overflow-scroll vh-100">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Filiere</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Cahier des charges</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php        
                  include_once('show.php');

                    // echo header("location:../listcontacts.php"); 
                    foreach($projects as $value): ?>
                    <tr class="bg-blue">
                        <td class="pt-2"> 
                            <div class="pl-lg-5 pl-md-3 pl-1 name"><?php echo $value['titre']?></div>
                        </td>
                        <td class="pt-3 mt-1"><?php if( $value['filiere']=="1"){
                            echo"DSI";
                            }else
                            echo"RSI";
                            ?></td>
                        <td class="pt-3"><?php echo $value['description']?></td>
                        <td class="pt-3"><a href="<?php echo $value['fichier']?>"><img src="src/pdf.png"/></a></td>
                        <td class="pt-3"><a href="home.php?idpfe=<?php echo $value['id_pfe']; ?>"><img src="src/edit.png"/></a></td>
                    
                    </tr>

                    <?php  endforeach; ?>
                                                </tbody>
                            </table>
                            <center><a href="home.php" class="button">Ajouter un nouveau sujet!</a> </center>
      </div>
</main>







<?php include("src/footer.php")?>
  </body>
</html>