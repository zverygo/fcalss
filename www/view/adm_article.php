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
        <div>
            <form method="post" action="../admin/admin.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="title" value="<?=$text['title']?>" class="form-item" autofocus required>
                </div>
                <div class="form-group">
                    <label>Дата</label>
                    <input type="date" name="date" value="<?=$text['date']?>" class="form-item" required>
                </div>
                <div class="form-group">
                    <label>Содержание</label>
                    <textarea class="form-item" name="content" required><?=$text['content']?></textarea>
                </div>
                <input type="submit" value="Save" class="btn">
            </form> 
        </div>
        <footer>
            <p>BLOG <br> Coryright &copy; 2016</p>
        </footer>
    </div>
</body>
</html>