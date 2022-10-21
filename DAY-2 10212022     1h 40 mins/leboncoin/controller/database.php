<?php

// controller
class Database
{

    private static $dns;
    private static $user;
    private static $password;
    private static $database;

    public function __construct()
    {
        self::$dns = "mysql:host=localhost;dbname=leboncoin;port=3306"; // À changer selon vos configurations
        self::$user = "root"; // À changer selon vos configurations
        self::$password = ""; // À changer selon vos configurations
        self::$database = new PDO(self::$dns, self::$user, self::$password);
    }



    // user function

    public function GetUsers(){
        $sql = 'SELECT * FROM user';
        $statement = self::$database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function ChangePassword($id, $newPassword){
        $sql = "UPDATE `user` SET `mot_de_passe` = :password WHERE `user`.`id_user` = :id";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":password" => md5($newPassword),":id"  => $id));
    }

    public function AddUser($nomuser, $prenomuser, $mailuser, $motdepasse){
        $sql = "INSERT INTO `user` (`nom_user`, `prenom_user`, `mail_user`, `mot_de_passe`)
                VALUES (:nomuser, :prenomuser, :mail, :motdepasse)";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":nomuser"=>$nomuser,":prenomuser"=>$prenomuser,":mail"=>$mailuser,":motdepasse"=>$motdepasse));
    }

    public function DeletteUser($id){
        $sql = "DELETE FROM `user` WHERE `user`.`id_user` = :iduser";
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":iduser",$id,PDO::PARAM_INT);
        $statement->execute();
    }

    public function Connect($mail, $password){
        $sql = "SELECT * FROM `user`
                WHERE mail_user = :mail
                AND mot_de_passe = :password";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":mail" => $mail, ":password" => $password ));
        return $statement->fetchAll();
    }


    // Annonce Function

    public function AddAnnnonce ($nom_annonce, $detail, $date, $id_user, $id_categorie, $media){ // ajouter des annonces
        $sql = "INSERT INTO `annonce` (`id_Annonce`, `nom_annonce`, `detail`, `date_ajout`, `USER_id_user`, `categorie_id_categorie`, `Media`) 
                VALUES (NULL, :nom_annonce, :detail, :date, :id_user, :id_categorie, :media)";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":nom_annonce" => $nom_annonce, ":detail" => $detail, ":date" => $date, ":id_user" => $id_user, ":id_categorie" => $id_categorie, ":media" => $media));
    }

    public function AlterAnnnonce ($id_annonce,$nom_annonce, $detail, $date, $id_user, $id_categorie, $media){ //modifier les annonces
        $sql = "UPDATE `annonce` SET `nom_annonce` = :nom_annonce, `detail` = :detail, `date_ajout` = :date, `Media` = :Media, `categorie_id_categorie` =:id_categorie
                 WHERE `annonce`.`id_Annonce` = {$id_annonce}
                   AND `annonce`.`USER_id_user` = {$id_user}";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":nom_annonce" => $nom_annonce, ":detail" => $detail, ":date" => $date, ":id_categorie" => $id_categorie, ":Media" => $media ));
        //TODO : Invalid parameter number: number of bound variables does not match number of tokens
    }


    public function GetAnnonceFromUser($id_user){ //permet de recuperer les annonces publiers par un utilisateur
        $sql = 'SELECT * FROM `annonce` WHERE `USER_id_user`=:id_user;';
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":id_user",$id_user,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function GetAnnonceFromUserAndId($id_user, $id_annonce){ //permet de recuperer les annonces publiers par un utilisateur
        $sql = 'SELECT * FROM `annonce` WHERE `USER_id_user`=:id_user AND id_Annonce = :id_annonce;';
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":id_user",$id_user,PDO::PARAM_INT);
        $statement->bindParam(":id_annonce",$id_annonce,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function GetAnnonce(){ //recuperer toutes les annonces
        $sql = 'SELECT * FROM `annonce`';
        $statement = self::$database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getAnnonceByFilters($keyword,$categoryID,$price){ //recuperer  les annonces par filters
        $sql = "SELECT * FROM `annonce` WHERE  `categorie_id_categorie` = ?  AND `prix` <= ?  AND `nom_annonce` LIKE '%".$keyword."%'  ";
 
        $statement = self::$database->prepare($sql);
        $statement->execute(array($categoryID,$price));
        return $statement->fetchAll();
    }

    public function getAnnonceByID( $id ){ //recuperer  les annonces par filters
        $sql = "SELECT * FROM `annonce` WHERE  `id_Annonce` = ?  ";
 
        $statement = self::$database->prepare($sql);
        $statement->execute(array($id));
        return $statement->fetchAll()[0];
    }


    public function DeletteAnnonce($id_annonce, $id_user){ //supprimer une annonce
        $sql = "DELETE FROM annonce WHERE annonce.id_Annonce= :id_Annonce AND `USER_id_user` = {$id_user}";
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":id_Annonce",$id_annonce,PDO::PARAM_INT);
        $statement->execute();
    }

    // Categorie Function

    public function GetCategorie(){ //choisir une categorie
        $sql = 'SELECT * FROM `categorie`';
        $statement = self::$database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    // FUNCTION POUR LA PAGE ADMIN SI ON A FINI
    public function AddCategorie ($nom_categorie){ //ajouter une categorie
        $sql = "INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) 
                VALUES (NULL, :nom_categorie)";
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":iduser",$nom_categorie,PDO::PARAM_INT);
        $statement->execute();
    }

    // Gestion des messages
    public function AddMessage($detail, $id_annonce, $id_user){ //pour ajouter un message
        $sql = "INSERT INTO `message` (`id_message`, `detail`, `Annonce_id_Annonce`, `USER_id_user`) 
                VALUES (NULL, :detail, :id_annonce, :id_user)";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":detail" => $detail, ":id_annonce" => $id_annonce, ":id_user" => $id_user));
    }

    // affichages des messages selon un utilisateur et le createur de l'annonce
    public function ShowUserMessage($id_annonce, $id_user){
        $sql = "SELECT message.detail as 'message', user.nom_user as 'recepteur', annonce.nom_annonce as 'Annonce', message.USER_id_user AS 'emmeteur'
                FROM message, annonce, user
                WHERE Annonce_id_Annonce = annonce.id_Annonce
                AND annonce.USER_id_user = user.id_user
                AND message.USER_id_user = :iduser
                AND annonce.id_Annonce = :idannonce ";
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":iduser",$id_user,PDO::PARAM_INT);
        $statement->bindParam(":idannonce",$id_annonce,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
}

