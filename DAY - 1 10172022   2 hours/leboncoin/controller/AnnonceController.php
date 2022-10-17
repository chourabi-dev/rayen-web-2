<?php



class AnnonceController{


    private static $dns;
    private static $user;
    private static $password;
    public static $database;

    function __construct()
    {
        self::$dns = "mysql:host=localhost;dbname=leboncoin;port=3306"; // À changer selon vos configurations
        self::$user = "root"; // À changer selon vos configurations
        self::$password = ""; // À changer selon vos configurations
        self::$database = new PDO(self::$dns, self::$user, self::$password);
    }


    public function createAnnonce($data, $files)
    {

        session_start();

        $nomAnnonce = $data['nom_annonce']; 
        $descreption_annonce = $data['descreption_annonce'];
        $categorie_annonce = $data['categorie_annonce'];
        $photo = $files['photo'];
        $userID = $_SESSION['user_id'];


 

        $photo = $files['photo'];
    
        $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);

        $tmp_name = $files["photo"]["tmp_name"];
        
        $photoID = uniqid();

        move_uploaded_file($tmp_name, './media/'.$photoID.'.'.$ext);

            
        // insert into !!!


        // UPDATE DELETE !!!!



        return array( 'success'=>true, 'message'=>'Annonce ajouté avec succée' );
                
    }



    

    public function getCategories()
    {

        $sql = 'SELECT * FROM `categorie`';
 
        $statement = self::$database->prepare($sql);
        $statement->execute();
        $categories = $statement->fetchAll();
        

        return $categories;
                
    }



    
    public function auth($data)
    {
        // check password and confirm password
        $password = $data['password']; 
        $email = $data['email'];

 
            

            // check !!
            $sql = 'SELECT * FROM  `user` WHERE `mail_user`= ? AND `mot_de_passe`=? ';
 
            $statement = self::$database->prepare($sql);
            $statement->execute(array( $email , md5($password) ));
            $users = $statement->fetchAll();

            if ( sizeof( $users ) != 0 ) {
                // create account
                $user = $users[0];

                session_start();

                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['user_email'] = $user['mail_user'];
                $_SESSION['user_name'] = $user['nom_user'];
                
                
                 
                
            }else{
                return array( 'success'=>false, 'message'=>'Mauvais email ou mot de passe.' );
            }
            
    }
    
 
}



?>