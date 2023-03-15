<?php
    require_once('../include/header.php');
    require_once('../include/dbcon.php');
    $ecole = $_SESSION['ecole'];
    ?>

        <nav class="" style="background-color:#526Fd7;">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo center hide-on-med-and-down" style="margin-left: 115px;">Rapports Mensuel</a>
                    <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down" style="margin-left: 30px;">
                        <li><a href=""><?php echo $ecole; ?></a></li>
                    </ul>
                </div>        
            </div>
        </nav>
        <div class="row main">
            <div class="col l12 m12 s12">
                <div class="card">
                    <ul class="collection">
                        <li class="collection-item">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <?php
                                $query="SELECT DISTINCT c.nom,m.libelle,a.idclasse,a.idMatiere FROM absence a, matier m,classes c WHERE a.idclasse =c.idclasse AND a.idMatiere =m.idmatiere AND a.justifiee='Non' AND a.comm_abs = DATE(NOW()) ORDER BY a.idclasse,m.idMatiere";
                                $exec1 = mysqli_query($con, $query);
                                if(mysqli_num_rows($exec1) > 0) {
                                    while($row = mysqli_fetch_assoc($exec1)) {
                                        $cls = $row["nom"];
                                        $Mat = $row["libelle"];
                                        $idCls = $row["idclasse"];
                                        $idMat =$row["idMatiere"]; ?>
                                       <div class="left"><center><p><?php echo  $cls ?></p></center></div>
                                       <div class="right"><center><p><?php echo  $Mat ?></p></center></div><?php
                                       //<center><p>  echo $cls.' - '.$Mat  </p></center>
                                        $req="SELECT * FROM `absence` A,`classes` C, `matier` M,students S
                                                WHERE `justifiee`='Non' AND comm_abs = DATE(NOW()) AND A.idclasse= C.idclasse AND A.idMatiere = M.idMatiere 
                                                AND  A.idclasse=".$idCls." AND A.idMatiere =".$idMat." AND S.rollno = A.rollno
                                                ORDER BY C.idclasse , M.idMatiere ASC";
                                        $res = mysqli_query($con,$req);
                                        if(mysqli_num_rows($res) > 0){ ?>
                                            <table class="striped">
                                                <tr  class="class" style="background-color: #fff; width:auto;color:#526Fd7;">
                                                    <th style="text-align: center;margin-left:0;">CNE</th>
                                                    <th style="text-align: center;margin-left:0;">Nom et Prenom</th>
                                                    <th style="text-align: center;margin-left:0;">justifier?</th>
                                                    <th style="text-align: center;margin-left:0;">Sms</th>
                                                </tr>
                                                <?php
                                                    while($row1 = mysqli_fetch_assoc($res)) {
                                                        $rollno = $row1["rollno"];
                                                        $nomcomplet = $row1["fstname"].' '.$row1["lstname"]; ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $rollno; ?></td>
                                                            <td style="text-align: center;"><a href="detailelv.php?rollno=<?php echo $rollno;?>" style="text-decoration: none;"><?php echo $nomcomplet; ?></a> <i class="tiny material-icons">info</i></td>
                                                            <td style="text-align: center;">
                                                                <p>
                                                                    <label>
                                                                        <input id="indeterminate-checkbox" type="checkbox" name= "<?php echo $rollno; ?>"/>
                                                                        <span></span>
                                                                    </label>
                                                                </p>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <p>
                                                                    <label>
                                                                        <input id="indeterminate-checkbox" type="checkbox" name= "<?php echo $rollno; ?>"/>
                                                                        <span></span>
                                                                    </label>
                                                                </p>
                                                            </td>
                                                        </tr>
                                            <?php   }   ?>
                                            </table>        
                                            <?php            
                                        }
                                    }
                                } ?>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
              
   
<?php
require_once('../include/sidenavadmin.php');
?>
<script>

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    window.location = "absjourmob.php";
}
</script>

<script>
    function reload_interval(time){
        setTimeout(function(){
            location.reload();
        }, time);
    }
    </script>
<?php
require_once('../include/footer.php');
?>