<?php
if(file_exists( "/views")){
    include_once ("../modele/session.php") ;
}else{
    include_once ("./modele/session.php") ;
}
?>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top ">
  <div class="container-fluid">
    <a class="navbar-brand me-5">WERJ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item me-5">
          <a class="nav-link" href="./index.php">Accueil</a>
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
                  <li><a class="dropdown-item" href="views/profile.php">Géréer son compte</a></li>
                  <li><a class="dropdown-item" href="./modele/logout.php">Se déconnecter</a></li>
                  <li><a class="dropdown-item" href="">Modifier son compte</a></li>
                </ul>
              </li> 
              
                
                
              <li class="nav-item dropdown me-5">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Mes annonces</a> 
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="./views/form_create_annonce.php">Ajouter une annonce</a></li>
                  <li><a class="dropdown-item" href="./views/checkboxDelAnnonce.php">Supprimer une annonce</a></li> 
                  <li><a class="dropdown-item" href="./views/form_modify_annonce.php">Modifer une annoce</a></li>
                </ul>
              </li>

              <button class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                </svg>
              </button>
              <p>""</p>
              
              <a class="btn btn-danger" href="likes.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg>
              </a>
              
              

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


