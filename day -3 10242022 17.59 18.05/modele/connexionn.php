<?php

    include('..\controller\database.php');
    include('..\modele\session.php');
    if (isset($_POST['mail'])&& $_POST['password']){
        $leboncoin = new Database();
        $users = $leboncoin->Connect($_POST['mail'], md5($_POST['password']));
            if  (count($users) >0){
                print_r ($users);
                Session($users[0]["nom_user"],$users[0]["mail_user"],$users[0]["id_user"],true);
                header("location: ../index.php"); //TODO : mettre ou la page va nous rediriger
            }else{
                echo "pas d'utilisateur";
                $_COOKIE["html"] = "
                ";
                // TODO: faire les details pour RAYANE
            }


    }
