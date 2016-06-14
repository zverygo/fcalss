<?php

include 'config.php';
include 'class/Post.php';
include 'class/Page.php';
include 'class/User.php';

$page = new Page ();

$row = new Post (HOST, USER, PASS, DB);
$num_row = $row -> get_num_row_db ();
$lim = 3;
$lim0 = 0;
$num_pages = $num_row/$lim;
$pages = 6;

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

else {
    $text = $page -> get_all($lim0,$lim);
    echo $page -> get_body($text, 'view/page');
}

?>