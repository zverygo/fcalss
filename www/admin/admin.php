<?php

include '../config.php';
include '../class/Database.php';
include '../class/Page.php';

$page = new Page ();

if (isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = "";   

    
if ($action == "add"){
    //тут будет функция добавления статьи
}
else {
    //echo "admin panel";
    $text = $page -> get_all(10);
    echo $page -> get_body($text, '../view/adm_articles');
}



?>