<?php
require("../controller/database.php");
if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["motdepasse"])){
    $nomU = $_POST["nom"];
    $prenomU = $_POST["prenom"];
    $emailU = $_POST["email"];
    $passwordU = $_POST["motdepasse"];
//    var_dump($_POST);

    $pers = new Database();
    $pers->AddUser($nomU, $prenomU, $emailU, md5($passwordU));
    echo "Welcome on WERJ dear " .$prenomU ."!";
    header("location: ../index.php"); // juste un exemple
}
?>