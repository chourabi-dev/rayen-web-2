<?php
    include('..\controller\database.php');
    include_once ("session.php");
//    var_dump($_SESSION);
if (isset($_POST)){
    $leboncoin = new Database();
    $annonce = $leboncoin ->GetAnnonceFromUserAndId($_SESSION["id"],$_POST["select"]);
    $categorie = $leboncoin ->GetCategorie();
    $options ="";
    foreach ($categorie as $option){
        $options = $options."<option value='{$option['id_categorie']}'> {$option['nom_categorie']} </option>";
    }
    $form = "
            <form action='modify_annonce.php' method='post'>
                Nom annonce <input type='text' name='nom_annonce' value='{$annonce[0]['nom_annonce']}'> <br>
                Detail <input type='text' name='detail' value='{$annonce[0]['detail']}'> <br>
                Prix <input type='float' name='prix' value='{$annonce[0]['prix']}'> <br>
                Media <input type='text' name='media' value='{$annonce[0]['Media']}'> <br>
                Categorie: <select name='categorie'>
                                   {$options}
                           </select> <br>
               <input type='hidden' name='id_annonce' value='{$annonce[0]['id_Annonce']}'>
               <input type='hidden' name='id_categorie' value='{$annonce[0]['categorie_id_categorie']}'>
              <input type='submit' value='modifer'> <input type='reset'>
            </form>";
    echo $form;
}
