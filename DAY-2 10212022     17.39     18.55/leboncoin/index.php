<?php

  require_once('./controller/database.php');

  $database = new Database();

  $keywords = '';
  $category = '';
  $prix = '';

  if ( isset($_GET['nom']) ) {
    $keywords = $_GET['nom'];

  }

  if ( isset($_GET['category']) ) {
    $category = $_GET['category'];

  }

  if ( isset($_GET['prix']) ) {
    $prix = $_GET['prix'];

  }

 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le bon coin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
        <?php
            include ("modele/session.php");
            require_once("views/navbar.php");
        ?>
  


      <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Leboncoin</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Weclome to our app</p>
                </div>
            </div>
        </header>



            <div class="container mt-5">


            <div class="row">
                    
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body">
                            <form action="" method="get">

                            <div class="form-group mb-3">
                              <label for="">Recherche par mot clé</label>
                              <input type="text" class="form-control" id="keywords" name="nom" value="<?php echo $keywords ?>">
                            </div>
                            <div class="form-group mb-3">
                              <label for="">Rcherche par category</label>
                              <select  class="form-control" id="category" name="category">
                                <option value="">Veuiller choisir une catégorie</option>

                                <?php
                                  $categories = $database->GetCategorie();


                                  foreach ($categories as $key => $cat) {
                                    echo '<option';
                                    
                                    if ($cat['id_categorie'] == $category) {
                                      echo ' selected ';
                                    }
                                    
                                    echo ' value="'.$cat['id_categorie'].'" >'.$cat['nom_categorie'].'</option>';
                                  }

                                ?>


                              </select>
                            </div>
                            <div class="form-group mb-3">
                              <label for="">Rcherche par prix</label>
                              <input type="number" value="<?php echo $prix ?>" class="form-control"  id="price" name="prix">
                            </div>
                            <div class="form-group mb-3">
                               <button class="btn btn-primary" type="submit">Rechercher</button>
                            </div>

                            </form>
                            
                            
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-8 row">



                      <?php 
                      
                      
                      $products = $database->getAnnonceByFilters( $keywords,$category,$prix );

                      

                      foreach ($products as $key => $product) {

                        echo '
                        <div class="col-md-4 mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="'.$product['Media'].'" alt="...">
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">'.$product['nom_annonce'].'</h5>
                                        <!-- Product price-->
                                       '.$product['prix'].' $
                                    </div>
                                </div>
                                <!-- Product actions-->';
                                if (  isset($_SESSION['id_user']) ) { // 
                                  echo '
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                      <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="annonce.php?id='.$product['id_Annonce'].'">View options</a></div>
                                  </div>
                                  ';
                                }
                                
                            echo '</div>
                        </div>
                        ';
                      }

                      
                      ?>



                    </div>
                      
                      
  
              </div>
            </div>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>