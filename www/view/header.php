<?php session_start (); ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Мой первый блог</title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link href="../public/css/font-awesome.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8">
                <h1><a href="../index.php">BLOG</a></h1>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
                <br>
                <?php
                if (isset($_SESSION["login"]))
                    echo '<a href="../reg/reg.php?action=lc">'.$_SESSION["login"].'</a>
                          <form method="post" action="../reg/reg.php?action=logout">
                          <input type="submit" name="logout" value="LOG OUT"></form>';      
                    else
                        echo '<h6><a href="../reg/reg.php">LOGIN</a></h6>';

                if ($_SESSION["role"] == "admin")
                    echo '<a href="../admin/admin.php?action=admin">Admin Panel</a>';// | 
                          //<a href="../admin/admin.php?action=users">Control Users</a> | 
                         // <a href="../admin/admin.php?action=add">Добавить статью</a><br><br>';
                if ($_SESSION["role"] == "moderator")
                    echo '<h6><a href="../admin/admin.php?action=add">Добавить статью</a><br><br></h6>';
                ?>
            </div>
        </div>
    </div>