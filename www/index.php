<?php

include 'config.php';
include 'class/Database.php';
include 'class/Page.php';

$page = new Page ();

if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
    //echo "index ".$id;
    if ($id!=0) {
        $text = $page -> get_one ($id);
        //print_r ($text);   
        echo $page -> get_body($text, 'view/article');
    }
    else {
        exit ('wrong parametr');
    }
}
else {
    $text = $page -> get_all(3);
    echo $page -> get_body($text, 'view/articles');
    
}

?>