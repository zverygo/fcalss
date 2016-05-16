<?php include_once 'header.php'; ?>

    <div class="container">
        <h6><a href="../admin/admin.php">Admin Panel</a></h6>
        <?php foreach($text as $a): ?>
            <div>
                <h3><a href="index.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
                <em>Опубликовано: <?=$a['date']?></em>
                <p><?=mb_substr($a['content'],0,250)."..."?></p>
            </div>
        <?php endforeach ?>
    </div>

<?php include_once 'footer.php'; ?>