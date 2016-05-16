<?php

include '../config.php';
include '../class/Database.php';
include '../class/Page.php';

$page = new Page ();
$row = new Database (HOST, USER, PASS, DB);

if (isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = "";   

if ($action == "reg") {
    if(!empty($_POST)){
        $text = $page -> get_reg ($_POST['email'], $_POST['password']);
    }
    echo $page -> get_body($text, '../view/register');
} 
else {
    if(!empty($_POST)){
        $text = $page -> get_log ($_POST['email'], $_POST['password']);
    }
    echo $page -> get_body($text, '../view/login');
}


/*if ($action == "add"){
    // функция добавления статьи
    if(!empty($_POST)){
        $text = $page -> get_new ($_POST['title'], $_POST['date'], $_POST['content']);
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

else {
    //echo "admin panel";
    $num_row = $row -> get_num_row_db ();
    $text = $page -> get_all($num_row);
    echo $page -> get_body($text, '../view/adm_articles');
}*/



?>