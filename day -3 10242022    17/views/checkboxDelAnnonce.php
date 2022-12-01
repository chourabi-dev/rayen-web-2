<?php include_once ("../modele/delete_annonce.php") ?>

<form action="" method="post">
    <table name="select">
        <td> supprimer </td> <td>Nom annonce </td> <td> Detail </td>
        <?php $var = DoTable($_SESSION["id"]); ?>
    </table>
</form>
