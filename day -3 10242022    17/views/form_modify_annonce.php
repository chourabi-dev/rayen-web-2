<html>
<?php  include_once("../modele/take_categorie.php");?>
    <head>
        <title> modifier un formulaire </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

            nav {
                height: 50px;
                font-family: 'Varela Round';
            }

            body {
                background-image: linear-gradient(to left, #fffbd5, #b20a2c);
            }

        </style>
    </head>
    <body class="p-3 m-0 border-0 bd-example">
    <nav>
        <p class="font-weight-bold text-light" style="font-size: 20px;">WERJ</p>
        <a href="../index.php" class="nav-link text-warning">Revenir à l'accueil</a>
    </nav>
    <hr>
    <h1 class="text-dark text-center" style="font-family: 'Varela Round';">Quelle annonce voulez-vous supprimer ?</h1>
    <form action="../modele/chose_annonce.php" method="post">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-5 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <div class="input-group mb-3 w-200 flex-nowrap">
                                    <label>
                                        <select name = "select">
                                        <?php  DoOption(); ?>
                                        </select>
                                    </label>
                                    <input type="submit" value="Choisir">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br><br><br><br><br>
    <p style="margin-left: 42.5%; color: white;">@Powered by Groupe 1 Bachelor 2 ECE</p>
    </body>
</html>
