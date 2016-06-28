<?php 
echo 'all tags'.'<br><br>';
$row = new Post (HOST, USER, PASS, DB);
$test_2 = $row -> pop_post ();
?>
<?php foreach($test_2 as $a): ?>
    <table>
        <tr>
            <td><a href="index.php?tag=<?=$a['tag']?>"><?=$a['tag']?></a></td>
            <td><?=$a['tag_rat']?></td>
        </tr>
    </table>
<?php endforeach ?>