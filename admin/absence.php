
<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
$ecole = $_SESSION['ecole'];

$query = "SELECT * FROM `classes`";
$run = mysqli_query($con,$query);
$query1 = "SELECT * FROM `matier`";
$run1 = mysqli_query($con,$query1);
    
?>
      <!-- The Coding Has Been Started From Here -->

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


      <!-- The Dashboard Coding Started From Here -->

        <div class="row main">
            <div class="col l12 m12 s12">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-panel">
                           
                            <div class="row">
                                <div class="input-field col s12 m4">
                                    <select name="classes" required> 
                                        <option value="" disabled selected>Choisir Classe</option>
                                        <?php
                                        while($row = mysqli_fetch_assoc($run)) {
                                            $idclass = $row['idclasse'];
                                            $nomclass = $row['nom'];?>
                                            <option value="<?php echo $idclass ;?>"><?php echo $nomclass ;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="input-field col s12 m4">
                                    <select name="Matieres"> 
                                        <option value="" disabled selected>Choisir la Matiere</option>
                                        <?php
                                        while($row1 = mysqli_fetch_assoc($run1)) {
                                            $idMatiere = $row1['idMatiere'];
                                            $nomMatiere = $row1['abrv'];?>
                                            <option value="<?php echo $idMatiere ;?>"><?php echo $nomMatiere ;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="input-field col s12 m4">
                                    <select name="Date"> 
                                        <option value="" disabled selected>Choisir le Mois</option>
                                        <?php
                                    $arraydw = array('Janvier', 'Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
                                        for($i=0; $i<12; $i++) { ?>

                                            <option value="<?php echo $i+1 ?>"><?php echo $arraydw[$i]; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row center">
                                <button type="submit" name="submit1" style="width:auto;border-radius: 15px;background-color:#FF8000;" class="btn">Parcourire</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                    if(isset($_POST['submit1'])){
                        $idclass = $_POST['classes'];$idMat = $_POST['Matieres'];
                        $run2 = mysqli_fetch_row(mysqli_query($con,"select nom from classes where idclasse=$idclass"));
                        $nomcl = $run2[0];
                        $run4 = mysqli_fetch_row(mysqli_query($con,"select libelle from matier where idMatiere=$idMat"));
                        $nomMat = $run4[0];
                                            
                                            
                        $month = $_POST['Date'];
                        $query_date = date("Y").'-'.$month.'-01';
                        // First day of the month.
                        $startdate= date('Y-m-01', strtotime($query_date));
                        // Last day of the month.
                        $enddate = date('Y-m-t', strtotime($query_date));
                        if(isset($idclass) && isset($idMat) && isset($month)){
                        $query3 = "SELECT * FROM `absence` A,students S where idclasse = $idclass and idMatiere = $idMat and A.rollno = S.rollno and comm_abs between '$startdate' and '$enddate' order by comm_abs ASC";
                        $run3 = mysqli_query($con,$query3);
                        if(mysqli_num_rows($run3) > 0){ ?>
                        <div class="card">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div   id="impr">
                                    <ul class="collection">
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col l4 center">
                                                    <table style = "border: 0px solid black;">
                                                        <tbody>
                                                            <tr style = "border: 0px solid black;">
                                                                <td style = "border: 0px solid black;"> Class :  <?php echo $nomcl;?></td>
                                                            </tr>
                                                            <tr style = "border: 0px solid black;">
                                                                <td style = "border: 0px solid black;"> Matiere :  <?php echo $nomMat ;?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col l4 right">
                                                    <table style = "border: 0px solid black;">
                                                        <tbody>
                                                            <tr style = "border: 0px solid black;">
                                                            <?php $rest = substr($query_date, 0, -3); ?>
                                                                <td style = "border: 0px solid black;"> Mois :  <?php echo $rest?></td>
                                                            </tr>
                                                            <tr style = "border: 0px solid black;">
                                                                <td style = "border: 0px solid black;"> Annee :  <?php echo (date("Y")-1)."/".date("Y") ;?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <table style = "border: 0px solid black;" class="">
                                                    <thead>
                                                        <tr   class="class" style="background-color: #fff; width:auto;color:#526Fd7;">
                                                            
                                                            <th style="text-align: center;margin-left:0;">CNE</th>
                                                            <th style="text-align: center;margin-left:0;">Nom et Prenom</th>
                                                            <th style="text-align: center;margin-left:0;">Date</th>
                                                            <th style="text-align: center;margin-left:unset;">justifiee</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($row3 = mysqli_fetch_assoc($run3)){
                                                            $rollno = $row3['rollno'];$fstname = $row3['fstname'].' '.$row3['lstname'];$standerd=$row3['comm_abs'];
                                                            $justifiee = $row3['justifiee'];
                                                            ?>
                                                        <tr>
                                                            <td style="text-align: center;margin-left:0;"><?php echo $rollno;?></td>
                                                            <td style="text-align: center;margin-left:0;"><?php echo $fstname;?></td>
                                                            <td style="text-align: center;margin-left:0;"><?php echo $standerd;?></td>
                                                            <td style="text-align: center;margin-left:0;"><?php echo $justifiee;?></td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            <div class="row center">
                                <button  id="download" style="width:auto;border-radius:15px; background-color:#FF8000;" class="btn">imprimmer</button>
                            </div>
                        </div>
                    <?php }else{?>
                            <div class="row center">
                                <span style="color:red;">Aucune Absence</span>
                            </div>
                            <?php
                            }
                            } } ?>
                                                
                        
                        
                </div>
            </div>
        </div>

      <!-- The Navbar Menu Collection List -->
<?php

require_once('../include/sidenavadmin.php');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>
window.onload = function () {
    document.getElementById("download")
    .addEventListener("click", () => {
            //get the part of the webpage that contains all the content to be printed in the pdf
            const invoice = this.document.getElementById("impr");
            console.log(invoice);
            console.log(window);
            //customize the pdf, margin etc...
            var opt = {
                margin: 0.60,
                filename: 'Rapport.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            //download the pdf
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>

<?php
require_once('../include/footer.php');
?>