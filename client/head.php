

<?php include('../includes/config.php') ;?>
<?php include('fonctionAdmin.php') ;?>





<!DOCTYPE html>
<html lang="fr">

<head>
<link rel="icon" type="image/png" href="../images/marque/DMC_2.png" />

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>espace client</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

 

  <!-- CSS POUR L IMPRESSION //////////////////////////////////////////////////////////////////////////////--->
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


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark   sticky-top" style="background-color: #dc3545;">

                   
    <a class="navbar-brand mr-1" href="client.php">
    <img src="../images/DMC_blanc.png"  height="30"   width="60"  alt="">
    <small>Espace client</small></a>

   

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0" style="color: white">
      
      <li>
      <h5><?php echo $_SESSION['nom_client']. ' '. $_SESSION['prenom_client'] . ' '; ?></h5>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-2x  fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         
          <a class="dropdown-item text-dark" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i>&nbsp;Se déconnecter</a>
        </div>
      </li>

      
            <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="../index.php" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-2x fa-arrow-circle-left"></i>
        </a>
         
      </li>
    </ul>

  </nav>
  <div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
 
   <li class="nav-item">
    <a class="nav-link" href="client.php">
      <i class="fas fa-fw fa-1x mr-2 fa-users"></i>
      <span>Clients</span>
    </a>
  </li>
 

   
    <li class="nav-item">
        <a class="nav-link" href="commandes.php">
          <i class="fas fa-fw fa-1x mr-2 fa-cart-arrow-down"></i>
          <span>Commandes</span></a>
      </li>

      <li class="nav-item">
    <a class="nav-link" href="profile.php">
      <i class="fas fa-fw fa-1x mr-2 fa-cog"></i>
      <span>Réglages</span>
    </a>
  </li>
      <li class="nav-item">
    <a class="nav-link" href="facture.php">
      <i class="fas fa-fw fa-1x mr-2 fa-file-invoice"></i>
      <span>Factures</span>
    </a>
  </li>
 
</ul>
