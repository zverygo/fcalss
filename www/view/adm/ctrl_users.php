<div>
        <table class="table table-striped">
            <tr>
                <th>USER</th>
                <th>DATE REG</th>
                <th>ROLE</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach($text as $a): ?>
            <tr>
                <td><?=$a['email']?></td>
                <td><?=$a['date_reg']?></td>
                <td><?=$a['role']?></td>
                <td><a href="../../admin.php?action=edit_u&id_u=<?=$a['id_user']?>">Редактировать</a></td>
                <td><a href="../../admin.php?action=delete_u&id_u=<?=$a['id_user']?>">Удалить</a></td>
            </tr>
        <?php endforeach ?>
        </table>    
</div> 