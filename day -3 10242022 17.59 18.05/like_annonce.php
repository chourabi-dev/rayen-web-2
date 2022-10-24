<?php
    include("modele/session.php"); 
    require_once('./controller/database.php');
    $database = new Database();


    $id = $_GET['id'];
    $userID = $_SESSION['id'];


    $connected = VerifySession();


    if ( $connected == true ) {
        // check if user already likes the article !!


        $database->addAnnonceToMyFavourites( $userID,$id );

        header("Location:annonce.php?id=".$id);

    }else{
        header("Location:index.php");
    
    }

    







?>
