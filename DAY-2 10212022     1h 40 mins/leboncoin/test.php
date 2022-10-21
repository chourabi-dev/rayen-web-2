<?php
    include ("modele/session.php");
    include ("controller/database.php");
        $leboncoin = new Database();
//    $var = "01234567890";
//    echo ("la var est ". $var);
//    $users = $leboncoin->GetUsers();
//        echo($users[3]["mot_de_passe"]);
//        if ($users[3]["mot_de_passe"] == md5($var)){
//            print_r("good");
//        }
//    $users = $leboncoin -> GetUsers();
//    print_r($users[0]);
//    $mot = $leboncoin ->connect("wilfriedbemelingue@gdmail.com","ebe596017db2f8c69136e5d6e594d365");
//        print_r($mot);
//        $leboncoin ->DeletteAnnonce(2, 8);
//    $leboncoin -> AlterAnnnonce(3,"wilfried","humain","2022-04-20","1","1","pinterest.png");
//        $Annonce = $leboncoin ->ShowUserMessage(5,5);
//        var_dump($Annonce);
//
//    $categorie = $leboncoin ->GetCategorie();
//    print_r($categorie[0]['nom_categorie']);
//include ("modele/session.php");
//
//var_dump($_SESSION["session"]);
//if(VerifySession()){
//    }else{
//        header("location: index.php");
//    }

echo date('y-m-j');
