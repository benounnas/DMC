    <header class="bg-white border-bottom border-danger">
      <div class="container-fluid">
        <div class="row align-items-center ">
          <div class="col-lg-3 col-md-12 col-sm-12">
              <nav class="navbar ">
                  <a class="navbar-brand" href="#">
                    <img src="images/marque/m5.png"  height="60" alt="">
                  </a>
                </nav>
          </div>

         
          <div class="col-lg-9 col-md-12  d-flex justify-content-end">
                <nav class="navbar navbar-expand-lg navbar-light  ">
                       
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                          <ul class="navbar-nav ">
                            <li class="nav-item active">
                              <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">A propos</a>
                            </li>
                           
                          
                                  <li class="nav-item">
                                        <a class="nav-link" href="#">Contact</a>
                                      </li>

                                    
                                          <li class="nav-item ml-3">
                                               
                                                     
                                              </li>
                                              <?php 
                                                if(isset($_SESSION['id_client']) && !empty($_SESSION['id_client'])){
                                                  echo ' <li class="nav-item ml-3" id="qtepanier">';
                                                  require_once('qtepanier.php');

                                                  echo ' </li>';
                                                }
                                              ?>
                                             
                                               
                                             
                                              <li class="nav-item ml-3">
                                                    <?php
                                                             if(isset($_SESSION['id_client']) && !empty($_SESSION['id_client'])){
                                                              echo '<a class="btn btn-block btn-danger" href="login.php">
                                                              <i class="fa fa-1x fa-user mr-2"></i>'.  $_SESSION['nom_client'] .' ' . $_SESSION['prenom_client'] .'</a>'. ' <a class="btn btn-block btn-danger" href="logout.php">
                                                              <i class="fa fa-1x  sign-out-alt mr-2"></i>Se déconnecter
                                                            </a>';

                                                             }else{
                                                               echo '<a class="btn btn-block btn-danger" href="login.php">
                                                               <i class="fa fa-1x fa-user mr-2"></i>Se connecter
                                                             </a>
                                                             
                                                             ';
                                                             }                                                       
                                                    ?>
                                                    
                                                  </li>
                                              
                          
                          </ul>
                        </div>
                      </nav>


            </div>     
            
          
        </div>
      </div>

    </header>