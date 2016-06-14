<?php foreach($text as $a): ?>
    <div>
        <h3><a href="index.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
        <em>Опубликовано: <?=$a['date']?></em>
        <p><?=mb_substr($a['content'],0,250)."..."?></p>
    </div>
<?php endforeach ?>