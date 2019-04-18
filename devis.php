
<?php include 'includes/config.php'; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    

<section class="jumbotron bg-danger text-light text-center">
        <h1>Devis</h1>
</section>

<div class="container mb-4">
  
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produit</th>
                            <th scope="col">Disponibilité</th>
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
    session_start();
    $_SESSION['listeIdProduit'] = $_SESSION['listeIdProduit'] ?? '';
    $listeProduitPannier = explode('/', $_SESSION['listeIdProduit']);
    if(isset($_GET['action']) && $_GET['action']=='supprimer'){
      $id_produit = $_GET['id_prod'];
    
        if(in_array($id_produit, $listeProduitPannier)){
          //var_dump($listeProduitPannier);
          foreach ($listeProduitPannier as $key => $value) {
             if($value== $id_produit){
              if(strpos($_SESSION['listeIdProduit'], $id_produit) !== NULL){

                   unset($listeProduitPannier[$key]);
                  
                   $_SESSION['listeIdProduit'] = implode('/', $listeProduitPannier);
                   header('location: devis.php');

              }
             }
          }
            //unset($listeProduitPannier[$id_produit]);
        }
    }

        //var_dump($listeProduitPannier);
    $y = count($listeProduitPannier);
  //  var_dump($listeProduitPannier);

//echo 'count : '.$y;
$prixtotaleDevis = 0;

    for ($i=1; $i < $y-1; $i++)  
     {
    
    $idp = $listeProduitPannier[$i]; 
   // echo 'id = ' . $idp . '<br>';
 
    $prixProduit = 'prixProduitTotal'.$idp;  
   // echo 'prix = ' . . '<br>';

    $_SESSION['prixTotal'] = $_SESSION['prixTotal'] + $_SESSION[$prixProduit];
    //echo 'prix totale= ' . $_SESSION['prixTotal']. '<br>';
 
    $qteProduit = 'qteProduit'.$idp ;
    //echo 'quantité = ' . . '<br>';

    $_SESSION['qteTotal'] = $_SESSION['qteTotal'] + $_SESSION[$qteProduit];
 
    $sql = "SELECT *
        FROM produit
        WHERE id_prod LIKE '$idp' ";

         
 if($pdo->query($sql)){
    foreach  ($pdo->query($sql) as $row) { 
    
    ?>
                        <tr>
                            <?php 
                            
                            $sqlimage = "SELECT * FROM image WHERE id_prod LIKE '$idp'";
                             if($pdo->query($sqlimage)){
                foreach  ($pdo->query($sqlimage) as $rowimage) { 
                    if(!empty($rowimage['url_imag'])){
                  
                        $imageprincipale =  $rowimage['url_imag'];
                      }
                    ?>

                           
                            <td><img src="<?php echo $imageprincipale; ?>" width="40px" /> </td>

                <?php };};?>
                            <td><?php echo $row['nom_prod']; ?></td>
                            <td>Disponible</td>
                            <td><input class="form-control" type="text" value="<?php echo $_SESSION[$qteProduit] ; ?>" /></td>
                            <td class="text-right"><?php echo $_SESSION[$prixProduit] ; ?></td>
                            <td class="text-right">
                                <form method="post" action="devis.php?action=supprimer&id_prod=<?php echo $idp; ?>">

                                <input type="submit" value="supprimer" class="btn btn-sm btn-danger">
                                </form>
                              <!--  <button class=""><i class="fa fa-trash"></i> </button> -->
                            </td>
                        </tr>
                     <?php 

                     $prixtotaleDevis +=  $_SESSION[$prixProduit] *  $_SESSION[$qteProduit];
                     //echo $prixtotaleDevis . '<br>';
                   
                    }; };};
                    
                    ?>  
                      
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?php   
                            if(isset($prixtotaleDevis)){
                                echo $prixtotaleDevis . ' DA';
                            }else{
                                echo '0 DA';
                            }
                            ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href ="index.php" class="btn btn-block btn-light">Continuer le shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Valider</button>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>