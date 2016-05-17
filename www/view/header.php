<?php

session_start ();

if (isset($_SESSION["login"]))
    echo $_SESSION["login"];
else
    echo "NO";
?>


<html>
<head>
    <meta charset="utf-8">
    <title>F_class</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <div class="container">
        <h1><a href="../index.php">BLOG</a></h1>
        <h6><a href="../reg/reg.php">LOGIN</a></h6>
        <h6><a href="../admin/admin.php">Admin Panel</a></h6>
    </div>
</head>
<body>