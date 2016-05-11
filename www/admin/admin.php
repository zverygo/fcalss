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

    
if ($action == "add"){
    //тут будет функция добавления статьи
    if(!empty($_POST)){
        $text = $page -> get_new ($_POST['title'], $_POST['date'], $_POST['content']);
        header ("Location: admin.php"); 
    }
    echo $page -> get_body ($text, "../view/adm_article");    
}
else {
    //echo "admin panel";
    $num_row = $row -> get_num_row_db ();
    $text = $page -> get_all($num_row);
    echo $page -> get_body($text, '../view/adm_articles');
}



?>