<html>
<head>
    <meta charset="utf-8">
    <title>F_class</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><a href="../index.php">BLOG</a></h1>
        <?php foreach($text as $a): ?>
        <div>
            <h3><a href="index.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
            <em>Опубликовано: <?=$a['date']?></em>
            <p><?=mb_substr($a['content'],0,250)."..."?></p>
        </div>
        <?php endforeach ?>
        <footer>
            <p>BLOG <br> Coryright &copy; 2016</p>
        </footer>
    </div>
</body>
</html>
