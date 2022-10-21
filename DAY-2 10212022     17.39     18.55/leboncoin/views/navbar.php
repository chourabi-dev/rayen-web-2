<?php include_once ("./modele/session.php") ;?>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top ">
  <div class="container-fluid">
    <a class="navbar-brand me-5">Leboncoin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item me-5">
          <a class="nav-link" href="./index.php">Aceuil</a>
        </li>
        
       <?php
            if (!isset($_SESSION["session"])) {
                echo '<li class="nav-item me-5">
                <a class="nav-link" href="views/connexion.html">Connexion</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link" href="views/form_inscription.html">Création du compte</a>
              </li>';
            } else {
                echo '
            
                <li class="nav-item dropdown me-5">
                <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown">'.$_SESSION["user"].'</a> 
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/leboncoin/profile.php">Géréer son compte</a></li>
                  <li><a class="dropdown-item" href="./modele/logout.php">Se déconnécter</a></li>
                  <li><a class="dropdown-item" href="#">Modifier son compte</a></li>
                </ul>
              </li> 
              
                
                
              <li class="nav-item dropdown me-5">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Mes annonces</a> 
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="create_annonce.php">Ajouter une annonce</a></li>
                  <li><a class="dropdown-item" href="delete_annonce.php">Supprimer une annonce</a></li> 
                  <li><a class="dropdown-item" href="#">Modifer une annoce</a></li>
                </ul>
              </li> 
              ';
            }
        ?>
      <form class="d-flex" action="./modele/search.php">
        <input type="search" class="form-control me-5" name="recherhce" placeholder="Recherche"cols="70" rows="1">
        <button class="btn btn-primary" type="button">Rechercher</button>
      </form>
    </div>
  </div>
</nav>


