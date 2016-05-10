<html>
<head>
    <meta charset="utf-8">
    <title>F_class</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><a href="../index.php">BLOG</a></h1>
        <h6><a href="../admin/admin.php">Admin Panel</a></h6>
        <div>
           <div>
                <h3><?=$text['title']?></h3>
                <em>Опубликовано: <?=$text['date']?></em>
                <p><?=$text['content']?></p>
            </div>
        </div>
        <footer>
            <p>BLOG <br> Coryright &copy; 2016</p>
        </footer>
    </div>
</body>
</html>
