<?php



class UserController{


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


    public function createAccount($data)
    {
        // check password and confirm password
        $password = $data['password'];
        $confirmPassword = $data['confirm_password'];
        $fullname = $data['fullname'];
        $email = $data['email'];


        if ($password == $confirmPassword) {
            

            // check !!
            $sql = 'SELECT * FROM  `user` WHERE `mail_user`= ? ';
 
            $statement = self::$database->prepare($sql);
            $statement->execute(array($email));
            $users = $statement->fetchAll();

            if ( sizeof( $users ) == 0 ) {
                // create account

                $sqlInsert = 'INSERT INTO `user`(`nom_user`, `mail_user`, `mot_de_passe`) VALUES (?,?,?)';
 
                $statement = self::$database->prepare($sqlInsert);
                $statement->execute(array($fullname,$email,md5($password)));
                

                return array( 'success'=>true, 'message'=>'Compte crée avec succée' );
            }else{
                return array( 'success'=>false, 'message'=>'Email déja utilisée' );
            }
            
        }else{
            return array( 'success'=>false, 'message'=>'Les mot de passe ne correspond pas' );
        }
        
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
                
                
                 
                return array( 'success'=>true, 'message'=>'Connectée' );
            }else{
                return array( 'success'=>false, 'message'=>'Mauvais email ou mot de passe.' );
            }
            
    }
    
 
}



?>