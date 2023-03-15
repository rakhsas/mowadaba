<?php
require_once('include/login_header.php');
?>
<?php
    require_once('include/dbcon.php');
    ?>
  
<!-- Session Checking -->
<?php
if(isset($_SESSION['name']))
{

}
else{
  
}

?>
<?php


?>

<nav class="darken-4" style="background-color:teal;">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="">Gestion d'école</a>
        

        <!-- Dropdown Structure
        <div class="right">
        <a class='dropdown-button btn' style="width: 140%; border-radius: 12px;" style="" data-target='dropdown1'>Drop Me!</a>
            <ul id='dropdown1' class='dropdown-content' >
                <li class="waves-effect waves-light"><a href="loginadmin.php">Administration</a></li>
            <li class="waves-effect waves-light"><a href="loginprof.php">Professeurs</a></li>
            <li class="waves-effect waves-light"><a href="students">Étudiant</a></li>
            </ul>
        </div>-->
        
        <ul class="right">
            <li class="waves-effect waves-light"><a href="loginadmin.php">Administration</a></li>
            <li class="waves-effect waves-light"><a href="loginprof.php">Professeurs</a></li>
            <li class="waves-effect waves-light"><a href="students">Étudiant</a></li>
        </ul>
    </div>
</nav>

   <body style="background-image:url(images/sms_bg.jpg); background-size: cover; background-repeat: no-repeat; height: 100vh;">
    <div class="row">
            <div class="col l4 offset-l4 m12 s12">
                <div class="card-panel with-header" style="border-radius: 15px; opacity: 0.9; margin-top: 25%;">
                    <div class="card-header center">
                        <h5>Information d'etudiant</h5>
                    </div>
                    <form action="" method="POST">
                    <!--<div class="input-field">
                        <select name="standerd" class="browser-default" > 
                        <select name="standerd" >
                            <option value="" class="disabled">Choisir une option </option>
                            <option value="TCSF">TCSF</option>
                            <option value="1BACSEF">1BACSEF</option>
                            <option value="2BACSPF">2BACSPF</option>
                        </select>
                    </div>-->
                    
                    <div class="input-field">
                        <input type="text" name="rollno" id="rollno">
                        <label for="rollno">CNE</label>
                    </div>
                    <div class="center">
                        <button class="btn waves-effect waves-black" name="submit" style="background-color:#98D7C2; color:black; width: 100%; border-radius: 15px;">Show Information</button>
                    </div>
                </form>
                </div>
            </div>
    </div>

<?php
 if(isset($_POST['submit'])){

    $standerd = $_POST['standerd'];
    $rollno = $_POST['rollno'];

    $query = "select * from students where `standerd` like '%$stander%' AND `rollno` = '$rollno'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);


      

    if($row < 1)
    {
        echo "<script> alert('!! INVALIDE CNE)</script>";
    }
    else{

        $data= mysqli_fetch_assoc($run);
        $image = $data['image'];
        $fstname = $data['fstname'];
        $lstname = $data['lstname'];
        $rollno = $data['rollno'];
        $standerd = $data['standerd'];
        $gender = $data['gender'];
        $city  = $data['Lieu de Naissance'];
        $contact = $data['contact'];
?>

    <!-- Table Coding-->

        <div class="row">
            <div class="col l6 offset-l3 m12 s12">
                <div class="card-panel" style="border-radius: 20px; opacity: 0.91">
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                            <?php echo $name; ?>
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>CNE</th>
                                            <td><?php  echo $rollno; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nom</th>
                                            <td><?php  echo $fstname; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Prenom</th>
                                            <td><?php  echo $lstname; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Filiere</th>
                                            <td><?php
                                            //$sd = intval($standerd);filiere($sd)
                                            echo $standerd; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact</th>
                                            <td><?php  echo $contact; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Lieu de Naissance</th>
                                            <td><?php  echo $city; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
               </div>
        </div>
    </div>
<?php
    }
}
?>

                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<!-- Compiled and minified JavaScript --> 
<script>

 $(document).ready(function(){

$('select').formSelect();
$('.dropdown-trigger').dropdown();
$('.dropdown-button').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrain_width: false, // Does not change width of dropdown to that of the activator
          hover: true, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'left' // Displays dropdown with edge aligned to the left of button
        }
      );
});

</script>
</body>
</html>
