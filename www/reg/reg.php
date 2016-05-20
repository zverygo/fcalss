<?php

include '../config.php';
include '../class/Post.php';
include '../class/Page.php';
include '../class/User.php';

$page = new Page ();
//$user = new User ();

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
    
    $text_2 = $page -> get_info_user ();
    
    $text = $page -> get_all_moder(); // формируем массив со стотьями
    echo $page -> get_body_2($text, $text_2, '../view/user');
    
}

else  {
    if(!empty($_POST)){
        $text = $page -> get_log ($_POST['email'], $_POST['password']);
    }
    echo $page -> get_body($text, '../view/login');
}

?>