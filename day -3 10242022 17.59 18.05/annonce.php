<?php
    include("modele/session.php");
    require_once("views/navbar.php");
    require_once('controller/database.php');
    $database = new Database();
    $data = $database->getAnnonceByID($_GET['id']);
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


      <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"><?php echo $data['nom_annonce'] ?></h1>
                    <p class="lead fw-normal text-white-50 mb-0">Voici les informations de l'annonce qui vous intéresse.</p>
                </div>
            </div>
        </header>

        <div class="card mb-5">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                  <h1><?php echo $data['nom_annonce'] ?></h1>
                                  <h3><?php echo $data['prix'] ?> €</h3>    
                                </div>

                                <div>
                                <p class="text-muted"><?php echo $data['date_ajout'] ?></p>
                                </div>
                                    
                                
                            
                            </div>
                            <img src=" <?php echo $data['Media'] ?>" class="w-100 rounded" alt="">
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body"> 
                         <p class="text-muted"><?php echo $data['detail'] ?></p>
                         
                        </div>
                    </div>

                    

                    <div class="card mb-5">
                        <div class="card-body mx-auto">

                        <?php 
                            if ( $database->userLikesAnnonce($_SESSION['id'],$_GET['id']) == true ) {
                                echo '
                                <a href="like_annonce.php?id='.$_GET["id"].'"  class="btn btn-success mx-auto" style="width: 250px">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                                                                                    </svg> Ajouter aux favoris</a> &nbsp;&nbsp;&nbsp;
                       
                                                                                                                    
                                ';
                            }else{

                                echo '
                                <a href="like_annonce.php?id='.$_GET["id"].'"  class="btn btn-danger mx-auto" style="width: 250px">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                                                                                    </svg> Retirer de mes favories</a> &nbsp;&nbsp;&nbsp;
                        
                                ';
                            }
                        
                        ?> 
                        
                        <a class="btn btn-success mx-auto" style="width: 250px"  value="<?php echo $_GET["id"]?>" href="views/chatbox.php?id=<?php echo $_GET['id'] ?>">Contacter l'utilisateur pour acheter cette article</a>
                       

                        </div>

                    </div>
                    
                    

            <?php require_once("views/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>