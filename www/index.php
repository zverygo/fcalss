<?php

include 'config.php';
include 'class/Post.php';
include 'class/Page.php';
include 'class/User.php';
include 'class/Admin.php';

$page = new Page ();

$row = new Post (HOST, USER, PASS, DB);
$num_row = $row -> get_num_row_db ();
$lim = 3;
$lim0 = 0;
$num_pages = $num_row/$lim;
$pages = 6;


$adm = new Admin (HOST, USER, PASS, DB);
$cap = $adm -> tech_work ();

if ($cap['value'] == 1) {
    $_GET['cap'] = 1;
    echo $page -> get_body($text, 'view/page');
}
else if ($cap['value'] == 0) {
    if (isset($_GET['id'])){
        if(empty($_POST['rating'])) {
            $id = (int)$_GET['id'];
            if ($id!=0) {
                $text = $page -> get_one ($id);
                echo $page -> get_body($text, 'view/page');
            }
            else {
                exit ('wrong parametr');
            }
        }
        else {
            $page -> get_rat ($_GET['id'], $_POST['rating']);
            header ("Location: ../index.php?id=".$_GET['id']);
        }
    }
    else if (!empty($_GET['page'])) {
        if ($_GET['page'] > $num_pages){
            $_GET['page'] = $num_pages;
            $text = $page -> get_all(($num_row-$lim),$lim);
            echo $page -> get_body($text, 'view/page');
        }
        else{    
            $lim0 = $lim*($_GET['page']-1);
            $text = $page -> get_all($lim0,$lim);
            echo $page -> get_body($text, 'view/page');
        }
    }
    else if (!empty($_GET['tag'])) {
        if ($_GET['tag'] == 'all') {
            echo $page -> get_body($text, 'view/page');   
        }
         else  {
            $text = $page -> get_tag ($lim0,$lim);
            echo $page -> get_body($text, 'view/page');
        }
    }
    else {
        $text = $page -> get_all($lim0,$lim);
        echo $page -> get_body($text, 'view/page');
}
}
?>