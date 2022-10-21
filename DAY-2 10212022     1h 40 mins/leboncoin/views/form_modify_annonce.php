<html>
<?php  include_once("../modele/take_categorie.php");?>
    <head><title> modifier un formulaire </title></head>
    <body>
    <form action="../modele/chose_annonce.php" method="post">
        <label>
            <select name = "select">
                <?php  DoOption(); ?>
            </select>
        </label>
        <input type="submit">
    </form>
    </body>
</html>
