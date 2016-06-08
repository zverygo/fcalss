<?php

include 'config.php';
include 'class/Post.php';
include 'class/Page.php';
include 'class/User.php';

$page = new Page ();

if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
    //echo "index ".$id;
    if ($id!=0) {
        $text = $page -> get_one ($id);
        //print_r ($text);   
        echo $page -> get_body($text, 'view/page');
    }
    else {
        exit ('wrong parametr');
    }
}

else if (!empty($_GET['page'])) {
    $lim0 = 0+10*($_GET['page']-1);
    $lim = 10;
    $text = $page -> get_all($lim0,$lim);
    echo $page -> get_body($text, 'view/page');
    
}

else {
    $text = $page -> get_all(0,10);
    echo $page -> get_body($text, 'view/page');
}

?>