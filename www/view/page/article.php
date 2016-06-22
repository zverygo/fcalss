<div class="col-lg-1">
    <div class="rate">
        <?php
        if (!empty($_GET['id'])){   
            $row = new Post (HOST, USER, PASS, DB);
            $rat = $row -> valuing ($_GET['id'],$_SESSION['id_user']);
            if (isset($rat)) {
                echo '<h4>'.$rat.'<h4>';
            }
        }
        ?>
        <?php if (!empty($_SESSION['login']) && !isset($rat)) : ?>
            <form method="post">
            <button class="btn btn-primary" type="submit" name = "rating" value = "+" action = "../../index.php?id=<?= $_GET['id'] ?>">
                <span class = "glyphicon glyphicon-plus"></span> 
            </button>
        </form>
        <form method="post">
            <button class="btn btn-primary" type="submit" name = "rating" value = "-" action = "../../index.php?id=<?= $_GET['id'] ?>">
                <span class = "glyphicon glyphicon-minus"></span> 
            </button>
        </form>
        <?php endif?>
    </div>
</div>

<div class="col-lg-11">     
    <h3><?=$text['title']?></h3>
    <em>Опубликовано: <?=$text['date']?></em>
    <p><?=$text['content']?></p>
</div>