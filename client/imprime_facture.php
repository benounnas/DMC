<?php include 'head.php';
 
if(!isset($_SESSION['id_client'])){
  header('location: ../index.php');
  }
// n'oubliez pas le css print
 ?>

<?php $idfacture = (int)$_GET['id']; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

       

        <!-- Page Content -->
        <hr>
        <p>
        
  
<?php 
  
$jsonclient = '"idClient":"'.$_SESSION['id_client'].'"';
  
$sql = "SELECT  * FROM commande WHERE  elements_produit LIKE '%$jsonclient%' AND  id_comd LIKE '$idfacture' LIMIT 1";

?>


    <?php 
        if($pdo->query($sql)){
           
            

            foreach  ($pdo->query($sql) as $commande) { ?>
 
  <?php 
  $facture = json_decode($commande['elements_produit'], true);

  ?>  

  <img src="../images/marque/DMC_2.png"  height="65"   width="150"  alt="">

  <table class="table table-striped custab">
                  
                    <tr>
                        <td> <h3>Facture  N° <?php echo $commande['id_comd']; ?></h3> </td>
                        <td> 
                        <button class="pc btn btn-danger" type="button" onclick="window.print()"><i class="fas fa-print"></i>&nbsp;imprimer</button>
                      

                             <?php if($commande['date_comd'] == '') { ?>
                            
                             <button id="btnvalide" class="pc btn btn-danger" type="button" onclick="validerlacommande(<?php echo $commande['id_comd']; ?>)"><i class="fas fa-check"></i>&nbsp;valider la commande</button>
                             <?php } ?>
                        </td>
                    <tr>
                        <td style="border-right: 2px solid #000">
                          <p> EURL DMC </p>
                          <p> Rue 11 Décembre BTN° 05 El Mouradia Alger </p>
                          <p> Delais de livraison 20 jours </p>
                          <p> Paiement à la livraison </p>

                        </td>
                         <td>
                          <p> A : <?php echo $facture['nom'].' '. $facture['prenom'];?></p>
                          <p> <?php echo $facture['adresse']; ?></p>
                          <p> <?php echo $facture['email']; ?></p>
                          <p> <?php echo $facture['telephone']; ?></p>
                        </td> 
                    </tr>
 </table>
 
 <table class="table table-striped custab"> 
             <thead>
            
                <tr>
                  

                    <th>N°</th>
                    <th>Produit</th>
                    <th>Prix u</th>
                    <th>Qte</th>
                    <th>Total</th>
                 
          
                 
                </tr>
            </thead>                   
                    <?php // liste des produits ?>
 
                         <?php $liste = $facture['listeid']; //recuperation de la liste des id des commande ?>
                         <?php $listeProduitPannier = explode('/', $liste); 
                               $y = count($listeProduitPannier); 
                               for ($i=1; $i < $y-1; $i++)  
                               { ?>

                         <?php $idp = $listeProduitPannier[$i]; // recuperer le id du produit du tableau $listeProduitPannier = explode('/', $liste); ?>
                               <tr>
                               <td><?php echo $i; ?></td>
                               <td><?php echo $facture['titreProduit'.$idp]; ?></td>
                               <td><?php echo $facture['prixProduit'.$idp]; ?></td>
                               <td><?php echo $facture['qteProduit'.$idp]; ?></td>
                               <td><?php echo $facture['totalProduit'.$idp]; ?></td>
                               </tr>
                               <?php }
                    ?>

               
 
 
                               <tr>
                               <td>Qte</td>
                               <td><?php echo $facture['qteGeneral']; ?></td>
                               <td> </td>
                               <td>Total ht</td>
                               <td><?php echo $facture['totalGeneral']; ?></td>
                               </tr>

                               <tr>
                               <td></td>
                               <td></td>
                               <td> </td>
                               <td>TVA 19%</td>
                               <td><?php echo ($facture['totalGeneral']*19/100); ?></td>
                               </tr>

                               <tr>
                               <td></td>
                               <td></td>
                               <td> </td>
                               <td>TOTAL GENERAL</td>
                               <td><?php echo ($facture['totalGeneral']*1.19); ?></td>
                               </tr>








</table>

                 

                        </div>

                    </div>
                </div>
            </div>
                   
              <?php 
            }
          
             } ?>     
            </table>





        </p>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     

    </div>
  <div class="pourprint">
  	<table style="border: 0px #fff solid !important; vertical-align: top; padding-right: 20px">

                                                              <tr style="border: 0px #fff solid !important; vertical-align: top; padding-right: 20px">
<td style="border: 0px #fff solid !important; vertical-align: top; padding-right: 20px">
<pre style="border: 0px #fff solid !important; vertical-align: top; padding-right: 20px">
Eurl. DMC
www.dmc.net
Rue 11 Décembre BTN° 05 El Mouradia Alger
</pre>

</td>
<td style="border: 0px #fff solid !important; vertical-align: top; padding-right: 20px">
<pre style="border: 0px #fff solid !important; vertical-align: top; padding-right: 20px">                               	
Contact
KRIM Adel
Téléphone : 0555-41-06-13 / 021-68-85-55
Email: eurl.woujoud@gmail.com
dmcondz@gmail.com
www.woujoud.net
</pre>

</td>
<td style="border: 0px #fff solid !important; vertical-align: top; padding-right: 20px">
<pre style="border: 0px #fff solid !important; vertical-align: top; padding-right: 20px">
N°RC: 19/01 – 1422237 ب f 24
N° Article: 9 87 13 25 12 45
NIF : 002617080442436
</pre>
</td> 
                               </tr>
</table> 
  </div> 
  <?php include 'foot.php'; ?>