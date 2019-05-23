

<?php include('../includes/config.php') ;?>
<?php include('fonctionAdmin.php') ;


?>






<!DOCTYPE html>
<html lang="fr" >

<head>
<link rel="icon" type="image/png" href="../images/marque/DMC_2.png" />

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Espace Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <link href="css/print.css" rel="stylesheet" media="print">

<style>
.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>

<script type="text/javascript">

  function produitAAaAne(id){
     var envoi   = "admin/fonctionAdmin.php?id="+id+"&action=alaune"; 
     $.get(envoi);
     //alert(envoi);
  }

  function produitordre(id){
     var ordre   = document.getElementById(id).value; 
     var envoi   = "admin/fonctionAdmin.php?id="+id+"&ordre="+ordre+"&action=ordre";
     $.get(envoi);
     //alert(envoi); 
  }

</script>

<link rel="stylesheet" href="../toast/toast.css">

<script src="../admin/vendor/jquery/jquery.js"></script>
    <script src="../toast/toast.js"></script>
</head>


<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark   sticky-top" style="background-color: #dc3545;">

    <a class="navbar-brand mr-1" href="client.php">
    <img src="../images/DMC_blanc.png"  height="50"   width="80"  alt="">
    
     <small>Espace admin</small></a>

   

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0" style="color: white">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-2x  fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Se déconnecter</a>
        </div>
      </li>


            <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="logout.php" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-2x  fa-arrow-circle-left"></i>
        </a>
         
      </li>

    </ul>

  </nav>
  <div id="wrapper">
<!-- Sidebar -->
<ul class="sidebar navbar-nav">
<li class="nav-item">

<br>



/*if( $_SESSION['id_admin'] == 1){

  echo '';
}
*/

  <a class="nav-link" href="admin.php">
  <i class="fas fa-fw fa-1x mr-2 fa-user"></i>
  <span>Admins</span>
</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="client.php">
      <i class="fas fa-fw fa-1x mr-2 fa-users"></i>
      <span>Clients</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="produit.php">
    <i class="fas fa-1x fa-box-open"></i>
      <span>Produits</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="famille.php">
      <i class="fas fa-fw fa-1x mr-2 fa-layer-group"></i>
      <span>Famille</span></a>
  </li>

  <li class="nav-item">
      <a class="nav-link" href="marque.php">
        <i class="fas fa-fw fa-1x mr-2 fa-building"></i>
        <span>Marque</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="commandes.php">
          <i class="fas fa-fw fa-1x mr-2 fa-cart-arrow-down"></i>
          <span>Commandes</span></a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="point_de_ventes.php">
            <i class="fas fa-fw fa-1x mr-2 fa-map-marker"></i>
            <span>Points de ventes</span></a>
        </li>












                 <?php
      
        $sql = "SELECT * FROM point_de_vente";
       
        ?>
                      
                      <?php 
            if($pdo->query($sql)){
            foreach  ($pdo->query($sql) as $row) { ?>

             
             

        <li class="nav-item">
          <a class="nav-link" href="un_point_de_ventes.php?idpointdevente=<?php echo $row['id_point_vente'] ;?>">
             
            <span>PV: <?php echo $row['titre_point_vente'] ;?></span></a>
        </li>

            <?php }
            }; ?>





           
                <li class="nav-item">
                    <a class="nav-link" href="votes.php">
                      <i class="fas fa-fw fa-1x mr-2 fa-star"></i>
                      <span>Votes</span></a>
                  </li>

                
</ul>

 


<script>
<?php 
/*********************** */
//var_dump($_SESSION);
 //$_SESSION['toast'] = 'Marque supprimé  avec succés';
if(isset(  $_SESSION['toast']) &&   $_SESSION['toast']){
  echo " toastr.options = {
   'closeButton': false,
   'debug': false,
   'newestOnTop': false,
   'progressBar': false,
   'positionClass':'toast-bottom-right',
   'preventDuplicates': false,
   'onclick': null,
   'showDuration':'2000',
   'hideDuration':'100',
   'timeOut':'2000',
   'extendedTimeOut':'100',
   'showEasing':'swing',
   'hideEasing':'linear',
   'showMethod':'fadeIn',
   'hideMethod':'fadeOut'
  }
  toastr.success('{$_SESSION['toast']}');
  ";

}



 
/************************************ */
?>
</script>