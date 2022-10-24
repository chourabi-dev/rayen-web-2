<?php
    include_once ("session.php");
    include('..\controller\database.php');
    function DoOption(){
        $leboncoin = new Database();
        $annonce = $leboncoin ->GetAnnonceFromUser($_SESSION["id"]);
        foreach ($annonce as $select){
            echo "<option value ='{$select["id_Annonce"]}'> {$select["nom_annonce"]} </option>";
        }
    }