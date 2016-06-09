<?php include 'view/header.php'; ?>

<div class="container">
    <?php
    //if (isset ($_POST['num'])) {
        //die ($_POST['num']);
    //}
    ?>
    <div>
        <form method="post">
            <select name="num">                
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                
            </select>
            <input type="submit" name="submit" value="apply"/>
        </form>
        <!--<form action="test.php" method="post">
            <select name="fruits">
                <option value="apple">Яблоко</option>
                <option value="cherry">Вишня</option>
                <option value="orange">Апельсин</option>
            </select>
            <input type="submit" name="send" value="Отправить" />
        </form>-->
    </div>
    <? 
   // echo $_POST['num'];
    //$_POST['apply']=10;
    ?>
    <table class="table table-striped">
    <?php for ($a = 0; $a<$_POST['num']; $a++) : ?>
        <tr>
            <td>1</td>
            <td><a href="#"><?= $a ?></a></td>
            <td><a href="#">Редактировать</a></td>
            <td><a href="#">Удалить</a></td>
        </tr>
    <? endfor ?>
    </table>    
</div>
<!-- модальное окно для редактирования статьи -->
   

<?php include 'view/footer.php'; ?>