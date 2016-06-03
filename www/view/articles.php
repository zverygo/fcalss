<?php foreach($text as $a): ?>
    <h3><a href="index.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
    <em>Опубликовано: <?=$a['date']?></em>
    <p><?=mb_substr($a['content'],0,250)."..."?></p>
<?php endforeach ?>
   