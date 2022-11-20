
<?php 
 include_once ("../modele/session.php");
 include_once ("../controller/database.php");
 $leboncoin = new Database(); 
 $categorie = $leboncoin ->GetCategorie();
 $options ="";
 foreach ($categorie as $option){
     $options = $options."<option value='{$option['id_categorie']}'> {$option['nom_categorie']} </option>";
 }
// var_dump($options);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout_annonce</title>
</head>
<body>
    <p class="logo-upper">WERJ</p>
    <hr>
    <h3>Ajoutez votre annonce</h3>
    <form action="../modele/create_annonce.php" method="post">
        <label >Nom de l'annonce</label><br>
        <input type ="text" name="nom_annonce" placeholder="Nom de l'annonce"><br><br>
        <label >Prix</label><br>
        <input type ="float" name="prix_annonce" placeholder="prix de l'annonce"><br><br>
        <label for="story">Détail de l'annonce:</label>
        <textarea id="detail_annonce" name="detail"
                rows="5" cols="33">
        </textarea><br><br>
        <label for="pet-select">Choisi la catégorie</label>
        <select name="Categories" id="categorie_annonce">
            <?php echo($options);?>
        </select><br><br>
        <label >Image</label><br>
        <input type ="text" name="media" placeholder="image"><br><br>
        <input class="button-submit" type="submit" value="Valider">
    </form>
    <br><br><br>
    <P style="margin-left: 43%; color: black">&copy;WERJ 2022|Powered by Groupe 1 Bachelor 2 ECE</P>
</body>
</html>

