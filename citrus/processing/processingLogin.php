<?php

    require_once('../inc.php');
    session_start();
    try{
        $login = new Login();  
    }catch(Exception $e){
        $e->getMessage();
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $user = $login->signin($_POST['username'],$_POST['password']);

        $_SESSION['user'] = $user[0]->role;
    }

header("Location: ../index.php");
?>