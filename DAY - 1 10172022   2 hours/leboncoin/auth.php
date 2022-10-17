<?php


require_once('./controller/user.php');

$userController = new UserController();



$res = null;

if (  $_POST != null  ) {
    $res =  $userController->auth($_POST);
}




?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le bon coin | Connexion</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Connexion</li>
                </ol>
            </nav>


            <div class="row justify-content-center mt-5">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>Connexion</h3>

                                <form action="" method="post">
 
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" required name="email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Mot de passe </label>
                                        <input type="password" class="form-control" minlength="10" required name="password">
                                    </div>
                                    
                                     

                                    <div class="form-group mb-3">
                                        <button class="btn btn-primary" type="submit">Connexion</button>
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

                                    <div class="form-group mb-3">
                                       <p class="text-muted">Vous n'avez un compte ?  <a href="/leboncoin/create-account.php">creer un maintenant</a></p>
                                    </div>


                                    

                                    



                                </form>
                            </div>
                        </div>
                    </div>
            </div>


        </div>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>