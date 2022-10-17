<?php 

session_start();

$user = $_SESSION;


?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Leboncoin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav"> 
        <li class="nav-item">
          <a class="nav-link" href="/leboncoin/index.php">Acceuil</a>
        </li>
       <?php


            if ( $user['user_id']== null ) {
                echo ' <li class="nav-item">
                <a class="nav-link" href="/leboncoin/auth.php">Connexion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/leboncoin/create-account.php">Création du compte</a>
              </li>';
            } else {
                echo '
                

                
              


                <li class="nav-item">
                <a class="nav-link active" href="/leboncoin/profile.php">'.$user['user_name'].'</a>
              </li> 

              <li class="nav-item">
                <a class="btn btn-warning btn-lg" href="/leboncoin/create-annonce.php">Ajouter une annonce</a>
              </li> 
              

              
              
              ';
            }
            


        ?>
      </ul>
    </div>
  </div>
</nav>


