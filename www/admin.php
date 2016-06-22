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

if ($_SESSION['role'] == "admin"){ // проверка чтобы нельзя было просто пройти по ссылке        
    if ($action == "add"){
        if(!empty($_POST)){
            $text = $page -> get_new ($_POST['title'], $_POST['content']);
        }
        echo $page -> get_body ($text, "../view/adm_article");
    } 
    else if ($action == "edit") {
        if (!isset ($_GET['id']))
            header ("Location: index.php"); // если id несуществует, то отправляет на главную
        $id = (int)$_GET['id'];
        if (!empty($_POST) && $id > 0) {
            $text = $page -> get_edit ($id, $_POST['title'], $_POST['content']);
        }
        $text = $page -> get_one ($id);
        echo $page -> get_body ($text, "../view/adm_article"); // вызываем шаблон добавления страницы и записываем в поля результат запроса
    }
    else if ($action == "delete") {
        $id = $_GET['id'];
        $page -> get_del ($id);
    }
    else if ($action == "users") {
        $num_row = 20;
        $text = $page -> get_all_user($num_row);
        echo $page -> get_body ($text, '../view/adm_users');
    }
    else if ($action == 'admin'){
        $num_row = $row -> get_num_row_db ();
        //$text = $page -> get_all(0,$num_row);
        if (!isset($_GET['num'])){
            $_GET['num'] = 10;
        }
        if (!empty($_GET['page'])) {
            $lim = $_GET['num']*($_GET['page']-1);
            $text = $page -> get_all($lim,$_GET['num']);
            echo $page -> get_body($text, '../view/page');
        }
        else {
            $text = $page -> get_all(0,$_GET['num']);
            echo $page -> get_body($text, '../view/page');
        }
    }
}
///////////////////////////////////////////////////
else if ($_SESSION['role'] == "moderator"){      
    if ($action == "add"){
        if(!empty($_POST)){
            $text = $page -> get_new ($_POST['title'], $_POST['content']);
        }
        echo $page -> get_body ($text, "../view/page");
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
        //$action = lc;
    }
    else {
        $text_2 = $page -> get_info_user ();
        $text = $page -> get_all_moder(); // формируем массив со стотьями
        //echo $page -> get_body_2($text, $text_2, '../view/user');
        echo $page -> get_body_2($text, $text_2, '../view/page');
    }
}
///////////////////////////////////////////////////    
else
    header ("Location: ../index.php"); 

?>