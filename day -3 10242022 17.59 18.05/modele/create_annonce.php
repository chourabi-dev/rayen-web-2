<?php
require("../controller/database.php");
include_once ("session.php");
var_dump($_POST);
if (isset($_POST["nom_annonce"]) && isset($_POST["prix_annonce"]) && isset($_POST["detail"]) && isset($_POST["Categories"]) && isset($_POST["media"])){
    $leboncoin = new Database();
    $nom_annonce = $_POST["nom_annonce"];
    $detail = $_POST["detail"];
    $prix= $_POST["prix_annonce"];
    $date = date('y-m-j');
    $id_categorie = $_POST["Categories"];
    $media = $_POST["media"];
    $leboncoin->AddAnnnonce ($nom_annonce , $detail ,$prix ,$date,$_SESSION["id"], $id_categorie ,$media);


    echo "Merci pour l'annonce créé de categorie" .$categoriesA."!";
    header("location: ../index.php"); // juste un exemple
}
?>