<?php
    include('..\controller\database.php');
    include_once ("session.php");
    $leboncoin = new Database();
    $id_createur_annonce = $leboncoin ->TakeMessage($_SESSION["id_annonce"])[0];
    $id_createur_annonce = $id_createur_annonce["id_user_annonce"];
    $emeteurs = $leboncoin -> ShowUserMessage($_SESSION["id_annonce"], $_SESSION["id"]);
    $recepteur = $leboncoin -> ShowUserMessage($_SESSION["id_annonce"],$id_createur_annonce);
    var_dump($recepteur);
//    for ($i=0; $i < count($emeteurs); $i++) {
//        echo "{$emeteurs[$i]['message']}<br>";
//        echo "{$recepteur[$i]['message']}<br>";
//    }
//    foreach ($emeteurs as $emeteur){
//        echo $emeteur["message"];
//    }

