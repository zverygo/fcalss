<?php

session_start ();

include '../config.php';
include '../class/Post.php';
include '../class/Page.php';
include '../class/User.php';

$page = new Page ();
$row = new Post (HOST, USER, PASS, DB);

if (isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = "";   

if ($_SESSION['role'] == "admin" or $_SESSION['role'] == "moderator"){ // проверка чтобы нельзя было просто пройти по ссылке    
    if ($action == "add"){
        // функция добавления статьи
        if(!empty($_POST)){
            $text = $page -> get_new ($_POST['title'], $_POST['content']);
        }
        echo $page -> get_body ($text, "../view/adm_article");
    } 
    else if ($action == "edit") {
        if (!isset ($_GET['id']))
            header ("Location: index.php");
        $id = (int)$_GET['id'];
        if (!empty($_POST) && $id > 0) {
            $text = $page -> get_edit ($id, $_POST['title'], $_POST['date'], $_POST['content']);
        }
        $text = $page -> get_one ($id);
        echo $page -> get_body ($text, "../view/adm_article");
    }
    else if ($action == "delete") {
        $id = $_GET['id'];
        $page -> get_del ($id);
    }
    else if ($action == "users") {
        //$num_row = $row -> get_num_row_db ();
        $num_row = 20;
        $text = $page -> get_all_user($num_row);
        echo $page -> get_body ($text, '../view/adm_users');
        //header ("Location: ../view/adm_users.php");
        
    }
    else {
        //echo "admin panel";
        $num_row = $row -> get_num_row_db ();
        $text = $page -> get_all($num_row);
        echo $page -> get_body($text, '../view/adm_articles');
    }
}
else
    header ("Location: ../index.php"); 


?>