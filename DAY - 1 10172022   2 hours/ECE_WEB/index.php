<?php
    require('modele/database.php');
    $leboncoin = new Database();
//    print_r($leboncoin);
//    On essaie de se connecter
    print("premier traitement");
    $user = $leboncoin->getUsers();
    print_r($user);
//    print("suppression");
//    $leboncoin->DeleteUser(1);
//    $user = $leboncoin->getUsers();
//    print_r($user);
//    print("insertion");
//    $leboncoin->AddUser("Debaybe","Angie","angie@outlook.com","123papa");
//    $user = $leboncoin->getUsers();
//    print_r($user);

