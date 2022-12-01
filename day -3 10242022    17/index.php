<?php
    include ("modele/session.php");
    require_once('controller/database.php');

    $database = new Database();
    $keywords = '';
    $category = '';
    $prix = '';
    $filter = '';

    if ( isset($_GET['nom']) ) {
        $keywords = $_GET['nom'];
    }
    if ( isset($_GET['category']) ) {
        $category = $_GET['category'];

    }
    if ( isset($_GET['prix']) ) {
      $prix = $_GET['prix'];
  }

  if ( isset($_GET['filter']) ) {
    $filter = $_GET['filter'];
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
        <?php require_once("views/navbar.php"); ?>


      <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Leboncoin</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Bienvenue sur WERJ</p>
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
                              <label for="">Recherche par categorie</label>
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
                              <label for="">Recherche par prix</label>
                              <input type="number" value="<?php echo $prix ?>" class="form-control"  id="price" name="prix">
                            </div>
                            
                            <div class="form-group mb-3">
                              <label for="filter">Filter par</label>
                              <select  class="form-control" id="filter" name="filter">
                                <option <?php if ( $filter== 'price_dec' ) {  echo 'selected'; } ?> value="price_dec">Prix décroissant</option>
                                <option <?php if ( $filter== 'price_acs' ) {  echo 'selected'; } ?> value="price_acs">Prix Asscendent</option>
                                
                              </select>
                            </div>
                            


                            <div class="form-group mb-3">
                               <button class="btn btn-primary" type="submit" name="rechercher">Rechercher</button>
                            </div>
                            </form>
                            
                            
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-8 row">



                      <?php 
                      
                      if(isset($_GET["rechercher"])){
                      $products = $database->getAnnonceByFilters( $keywords,$category,$prix, $filter );

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
                                       '.$product['prix'].' €
                                    </div>
                                    
                                </div>
                                
                                
                                <!-- Product actions-->';
                                if (isset($_SESSION["session"])) {
                                    echo '
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                      <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="annonce.php?id='.$product['id_Annonce'].'">Plus d informations</a></div>
                                    </div>
                                    ';
                                    
                                }else{
                                    echo'
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                      <div class="text-center"><a class="btn btn-outline-danger mt-auto" >Vous n avait pas accès a l annonce. Connecter-vous</a></div>
                                    </div>
                                    ';
                                  }
                                
                            echo '</div>
                        </div>
                        ';
                      }
                    }else{
                      $products = $database->getAnnonce();

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
                                       '.$product['prix'].' €
                                    </div>
                                </div>
                                
                                
                                <!-- Product actions-->';
                                if (isset($_SESSION["session"])) {
                               
                                  // if ( isset($_SESSION['id_user']) ) { 
                                    echo '
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                      <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="annonce.php?id='.$product['id_Annonce'].'">plus d informations</a></div>
                                    </div>
                                    ';
                                }else{
                                    echo'
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                      <div class="text-center"><a class="btn btn-outline-danger mt-auto">Vous n avez pas accès a l annonce. Connecter-vous</a></div>
                                    </div>
                                    ';
                                  }
                                
                            echo '</div>
                        </div>
                        ';
                      }
                    }

                      
                      ?>



                    </div>
                      
                      
  
              </div>
            </div>
            </div>
            <?php require_once("views/footer.php"); ?>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>