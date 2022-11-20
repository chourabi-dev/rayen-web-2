<?php

session_start();

function Session ($nomU="",$mail="",$id="",$connect = false){

    $_SESSION["user"] = $nomU;
    $_SESSION["mail"] = $mail;
    $_SESSION["id"] = $id;
    if ($connect){
        $_SESSION["session"] = true;
    }else{
        $_SESSION["session"]=false;
        //header("location:../index.html");
    }
}

function VerifySession(){
    $session = false;

    if ($_SESSION["session"]){
        $session = true;
    } 
    return $session;
}
