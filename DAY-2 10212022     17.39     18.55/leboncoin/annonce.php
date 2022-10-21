<?php

  require_once('./controller/database.php');

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
    
        <?php
            include ("modele/session.php");
            require_once("views/navbar.php");
        ?>
  


      <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"><?php echo $data['nom_annonce'] ?></h1>
                    <p class="lead fw-normal text-white-50 mb-0">More descreption</p>
                </div>
            </div>
        </header>



            <div class="container mt-5">

                <h1 class="text-success text-end">
                <?php echo $data['prix'] ?> $
                </h1>


                <img src=" <?php echo $data['Media'] ?>" class="w-100 rounded" alt="">


                <p class="text-muted">
                <?php echo $data['detail'] ?>
                </p>
  
            </div>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>