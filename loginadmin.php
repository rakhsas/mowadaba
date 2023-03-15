<?php
require_once('include/login_header.php');
?>
<?php

    require_once('include/dbcon.php');

    if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = htmlentities(mysqli_real_escape_string($con,$email));
    $password = htmlentities(mysqli_real_escape_string($con,$password));

    $query = "SELECT * FROM `admin` WHERE `email` = '$email' and `password` = '$password' ";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
        $_SESSION['login_failed'] = "Username Or Password Wrong";
        $login_failed = $_SESSION['login_failed'];
    }
    else{
        $data = mysqli_fetch_assoc($run);
        $name = $data['name'];
        $uid = $data['id'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['uid'] = $uid;
        $query4 = mysqli_fetch_row(mysqli_query($con,"select NomEtab from `etablissement` E , admin A where A.id=$uid and E.idEtab = A.idEtab"));
        $ecole = $query4[0];
        $_SESSION['ecole'] = $ecole;
        header("location:admin/dashboardadmin");
    }
}
?>


<?php
if(isset($_SESSION['ecole']) && isset($_SESSION['uid']))
{
header("location:admin/dashboardadmin");
}
else{
  
}

?>
  <body style="background: url() center top repeat-x #fff; background-size: cover;">
  <nav class="darken-4" style="background-color:#526Fd7;">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="index"><img src="images/whitelogo.svg" width="30" height="25"> Mowadaba</a>
        <ul class="right">
            <li class="waves-effect waves-light" style="background: rgba(2, 57, 183, 0.8)"><a href="loginadmin">Administration</a></li>
            <li class="waves-effect waves-light" ><a href="loginprof">Professeur</a></li>
            <li class="waves-effect waves-light"><a href="students">Élève</a></li>
        </ul>
    </div>
</nav>
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                <h5 class="<?php if(isset($login_failed)) { echo "hide";} ?>" >Espace Administration !</h5>
                            </div>
                                                            <span class="card-title container">
              <h5 class="center red-text"><?php 
              
                if(isset($login_failed)){
                  echo $login_failed; 
                }
                

              ?> </h5>
            </span>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    person
                                </i>
                                <input type="text" name="email" value="" id="email" required="required">
                                <label for="email">Addresse Mail</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    lock
                                </i>                    
                                <input type="password" name="password" value="" id="password" required="required">
                                <label for="password">Mot de Passe</label>
                            </div>
                        <br>
                            <div>
                            <button type="submit" name="login" class="btn" style="width: 100%; border-radius: 15px; background-color:#FF8000;">Se Connecter</button>
                        </div>
                        </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<style>
    .accueil-footer {
  position: fixed;
  bottom: 0px;
  width: 100%;
  background: #fff;
  border-top: 1% solid #d2d6de;
  padding: 12px;
}.pull-right {
  float: left !important;
  padding-left: 5%;
}

.pull-left {
  float: right !important;
  padding-right: 5%;
}
</style>
<footer>

      <div class="accueil-footer">
        <div class="pull-right"><b>Version</b> 2.0</div>
        <div class="pull-left">
          <strong>Copyright © <?php echo date("Y"); ?></strong>
        </div>
      </div>

    </footer>
</html>