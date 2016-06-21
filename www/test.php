<?php include 'view/header.php'; ?>
<div class="container">
<?php
    include 'class/Post.php';
    $row = new Post ("localhost", "root", "", 'blog');
    $test_2 = $row -> pop_post ();    
?>
<?php foreach($test_2 as $a): ?>
    <table class="table table-striped">
        <tr>
            <td><?=$a['S.full_name']?></td>
            <td><?=$a['id_sect']?></td>
            <td><?=$a['id']?></td>
            <td><?=$a['title']?></td>
            
        </tr>
    </table>
<?php endforeach ?>    
</div>

<?php include 'view/footer.php'; ?>