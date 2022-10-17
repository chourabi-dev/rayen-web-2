<?php


require_once('./controller/user.php');
require_once('./controller/AnnonceController.php');

$blocCategories = '';

$annoncesController = new AnnonceController();


$categories = $annoncesController->getCategories();


foreach ($categories as $key => $category) {
    $blocCategories.='<option value="'.$category['id_categorie'].'">'.$category['nom_categorie'].'</option>';
}
 



$res = null;

if (  $_POST != null  ) {
   $res =  $annoncesController->createAnnonce($_POST,$_FILES);
}




?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le bon coin | Ajouter une annonce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
        <?php
            require_once("./views/navbar.php")
        ?>
  


        <div class="container mt-5">


            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/leboncoin/index.php">Acceuil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter une annonce</li>
                </ol>
            </nav>


            <div class="row justify-content-center mt-5">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>Ajouter une annonce</h3>

                                <form action="" method="post" enctype="multipart/form-data">
 
                                    <div class="form-group mb-3">
                                        <label for="">Titre</label>
                                        <input type="text" class="form-control" required name="nom_annonce">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Déscreption</label>
                                        <textarea class="form-control" required name="descreption_annonce"></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Catégorie</label>
                                        <select class="form-control" required name="categorie_annonce">
                                            <option value="">Veuiller choisir une categorie</option>
                                            <?php  echo $blocCategories  ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control" required name="photo">
                                    </div>
                                    
 
                                     

                                    <div class="form-group mb-3">
                                        <button class="btn btn-primary w-100" type="submit">Ajouter l'article</button>
                                    </div>


                                    <?php 
                                        if ($res != null) {
                                            if ($res['success'] == true) {
                                                echo '<div class="alert alert-success">'.$res['message'].'</div>';

                                            }else{
                                                echo '<div class="alert alert-danger">'.$res['message'].'</div>';
                                                
                                            }
                                        }
                                    ?>
  

                                </form>
                            </div>
                        </div>
                    </div>
            </div>


        </div>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>