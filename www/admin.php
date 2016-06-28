<?php

session_start ();

include 'config.php';
include 'class/Post.php';
include 'class/Page.php';
include 'class/User.php';
include 'class/Admin.php';

$page = new Page ();
$row = new Post (HOST, USER, PASS, DB);
$adm = new Admin (HOST, USER, PASS, DB);

if (isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = "";   

if ($_SESSION['role'] == "admin"){ // проверка чтобы нельзя было просто пройти по ссылке        
    if ($action == "admin"){
        echo $page -> get_body ($text, "view/adm/adm_pan");
    } 
    else if ($action == "add"){
        if(!empty($_POST)){
            $text = $page -> get_new ($_POST['title'], $_POST['content']);
        }
        echo $page -> get_body ($text, "view/adm/adm_pan");
    } 
    else if ($action == "edit") {
        if (!isset ($_GET['id']))
            header ("Location: index.php"); // если id несуществует, то отправляет на главную
        $id = (int)$_GET['id'];
        if (!empty($_POST) && $id > 0) {
            $text = $page -> get_edit ($id, $_POST['title'], $_POST['content']);
        }
        $text = $page -> get_one ($id);
        echo $page -> get_body ($text, "view/adm/adm_pan"); // вызываем шаблон добавления страницы и записываем в поля результат запроса
    }
    else if ($action == "delete") {
        $id = $_GET['id'];
        $page -> get_del ($id);
    }
//РАБОТА С ПОЛЬЗОВАТЕЛЯМИ
    //вывод таблицы с пользователями
    else if ($action == "users") {
        $num_row = 20;//сделать как с постами
        $text = $page -> get_all_user($num_row);
        echo $page -> get_body ($text, 'view/adm/adm_pan');
    }
    //редактирование данных поьзователя
    else if ($action == "edit_u") {
        if (!isset ($_GET['id_u']))
            header ("Location: index.php"); // если id несуществует, то отправляет на главную
        $id_u = (int)$_GET['id_u'];
        if (!empty($_POST) && $id_u > 0) {
            $text = $page -> get_edit ($id, $_POST['title'], $_POST['content']);
        }
        $text = $page -> get_one ($id);
        echo $page -> get_body ($text, "view/adm/adm_pan"); // вызываем шаблон добавления страницы и записываем в поля результат запроса
    }
    //удаление пользователя -- не работает
    else if ($action == "delete") {
        $id = $_GET['id'];
        $page -> get_del ($id);
    }
    else if ($action == 'ctrl_posts'){
        $num_row = $row -> get_num_row_db ();
        //$text = $page -> get_all(0,$num_row);
        if (!isset($_GET['num'])){
            $_GET['num'] = 10;
        }
        if (!empty($_GET['page'])) {
            $lim = $_GET['num']*($_GET['page']-1);
            $text = $page -> get_all($lim,$_GET['num']);
            echo $page -> get_body($text, 'view/adm/adm_pan');
        }
        else {
            $text = $page -> get_all(0,$_GET['num']);
            echo $page -> get_body($text, 'view/adm/adm_pan');
        }
    }
  //УПРАВЛЕНИЕ САЙТОМ
    else if (!empty($_GET['cap'])) {
        if ($_GET['cap'] == on){
            $value = 0;
        }
        else if ($_GET['cap'] == off) {
            $value = 1;
        }
        $adm -> on_off_site ($value);
        
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