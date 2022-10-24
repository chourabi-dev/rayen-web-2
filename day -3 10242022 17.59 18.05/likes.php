<?php
    include ("modele/session.php");
    require_once('controller/database.php');

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
            


            <div class="row justify-content-center">
                    
                    


                    <div class="col-sm-8 row">

                        <div class="col-12">
                        <h1>My likes</h1>
                        </div>


                        <hr>


                        <div class="col-12">
                            <table class="table">
                                <tbody>
                                    <?php 
                        
                                        $likedProducts = $database->affiche_like($_SESSION['id']);


                                        foreach ($likedProducts as $key => $product) {
                                            echo '<tr>

                                                <td>'.$product['id_Annonce'].'</td>
                                                <td>
                                                    <img src="'.$product['Media'].'" width="80px" />
                                                </td>
                                                
                                                <td><strong>'.$product['nom_annonce'].'</strong></td>
                                                <td>'.$product['prix'].'$</td>
                                                
                                                <td><a href="annonce.php?id='.$product['id_Annonce'].'" class="text-primary">Voir annonce</a></td>
                                                
                                                <td><a href="like_annonce.php?id='.$product['id_Annonce'].'" class="text-danger">Retirer</a></td>
                                                
                                                 
                                                
                                                

                                            </tr>';
                                        }

                        
                                    ?>
                                    
                     
                                </tbody>
                            </table>
                        </div>



                    </div>
                      
                      
  
              </div>
            </div>
            </div>
            <?php require_once("views/footer.php"); ?>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>