<?php include_once 'header.php'; ?>

    <div class="container">
        <a href="admin.php?action=add">Добавить статью</a><br><br>
        <table class="admin-table">
            <tr>
                <th>Дата</th>
                <th>Заголовок</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach($text as $a): ?>
            <tr>
                <td><?=$a['date']?></td>
                <td><?=$a['title']?></td>
                <td><a href="../admin/admin.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>
                <td><a href="../admin/admin.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
            </tr>
        <?php endforeach ?>
        </table>    
    </div>

<?php include_once 'footer.php'; ?>