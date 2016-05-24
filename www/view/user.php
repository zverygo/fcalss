<?php include_once 'header.php'; ?>

<div class="container">
    
    <h3>Данные пользователя</h3>
    <table class="admin-table">
        <tr>
            <th>Full Name</th>
            <td><?=$text_2['full_name']?></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><?=$text_2['email']?></td>
        </tr>
        <tr>
            <th>Role</th>
            <td><?=$text_2['role']?></td>
        </tr>
        <tr>
            <th>Date Reg</th>
            <td><?=$text_2['date_reg']?></td>
        </tr>
        <tr>
            <th>About</th>
            <td><?=$text_2['about']?></td>
        </tr>        
    </table> 
    <form method="post" action="../reg/reg.php?action=edit_user">
        <br>
        <input type="submit" value="Изменить" class="btn">
    </form>
</div>   

<? if ($_SESSION['role'] == "moderator") :?>
<div class="container">
    <h3>Tабличтка с постами если модератор</h3>
    <table class="admin-table">
        <tr>
            <th>Дата и время</th>
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
<? endif ?>

<?php include_once 'footer.php'; ?>