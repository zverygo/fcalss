<?php

include 'config.php';
include 'class/Database.php';
include 'class/Page.php';

$page = new Page ();
if (isset($_GET['id'])){
        
}
else {
    $text = $page -> get_all();
    echo $page -> get_body($text, 'view/articles');
    
}

?>