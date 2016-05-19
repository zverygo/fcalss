<?php session_start (); ?>

<html>
<head>
    <meta charset="utf-8">
    <title>F_class</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <div class="container">
        <h1><a href="../index.php">BLOG</a></h1>
        <?php
        
        if (isset($_SESSION["login"]))
            echo '<a href="../reg/reg.php?action=lc">'.$_SESSION["login"].'</a>
                  <form method="post" action="../reg/reg.php?action=logout">
                  <input type="submit" name="logout" value="LOG OUT"></form>';      
            else
                echo '<h6><a href="../reg/reg.php">LOGIN</a></h6>';
            
        if ($_SESSION["role"] == "admin")
            echo '<h6><a href="../admin/admin.php">Admin Panel</a></h6>
                  <h6><a href="../admin/admin.php?action=users">Control Users</a></h6>
                  <h6><a href="../admin/admin.php?action=add">Добавить статью</a><br><br></h6>';
        if ($_SESSION["role"] == "moderator")
            echo '<h6><a href="../admin/admin.php?action=add">Добавить статью</a><br><br></h6>';
        ?>
    </div>
</head>
<body>