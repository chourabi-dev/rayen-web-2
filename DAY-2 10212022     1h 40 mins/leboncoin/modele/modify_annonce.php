<?php
    include('..\controller\database.php');
    include_once ("session.php");

    if (isset($_POST)){
        $leboncoin = new Database();
        $date = date('y-m-j');
        $leboncoin->AlterAnnnonce($_POST["id_annonce"],$_POST["nom_annonce"],$_POST['detail'], $date, $_SESSION["id"],$_POST['id_categorie'], $_POST["media"]);
        echo "good";
        header("location: ../views/good.html");
    }