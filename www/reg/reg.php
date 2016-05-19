<?php

include '../config.php';
include '../class/Post.php';
include '../class/Page.php';
include '../class/User.php';

$page = new Page ();

if (isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = ""; 

if ($action == "reg") {
    if(!empty($_POST)){
        if ($_POST['password'] == $_POST['r_password']){ // проверка пароля на совпадение
            $text = $page -> get_reg ($_POST['email'], $_POST['password']);
        }
        else
            echo "пароли не совпадают";
    }
    echo $page -> get_body($text, '../view/register');
}
else if ($action == "logout"){
    session_start ();
    if (!empty($_POST)){
        unset($_SESSION['name']);
        session_destroy ();
    }
    header ("Location: ../index.php");    
}

else if ($action == "lc") {
    header ("Location: ../view/user.php");
}

else  {
    if(!empty($_POST)){
        $text = $page -> get_log ($_POST['email'], $_POST['password']);
    }
    echo $page -> get_body($text, '../view/login');
}

?>