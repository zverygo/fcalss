<div>
    <div>
        <p>Управление постами</p>
        <form method="get">
            <select name="num">
                <?php 
                for ($q=0, $w=10;$q<5;$q++,$w+=10) {
                    echo '<option value="'.$w.'">'.$w.'</option>';
                }
                ?>
            </select>
            <button class="btn btn-default" type="submit" name="action" value="admin">APPLY</button>
        </form>
    </div>
    <table class="table table-striped">
        <tr>
            <th>№</th>
            <th>Дата и время</th>
            <th>Заголовок</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($text as $a): ?>
            <tr>
                <td>
                    <?= $b+=1; ?>
                </td>
                <td>
                    <?=$a['date']?>
                </td>
                <td>
                    <a href="#<?= $a['id'] ?>" data-toggle="collapse"><?=$a['title']?></a>
                    <div class="row collapse" id="<?= $a['id'] ?>">
                        <div class="well">
                            <p><?=$a['content']?></p>
                        </div>
                    </div>
                </td>
                <td><a href="../../admin.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>
                <td><a href="../admin.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
            </tr>
        <?php endforeach ?>
    </table>
    <div>
        <ul class="pagination">
            <?php
            $row = new Post (HOST, USER, PASS, DB);
            $num_row = $row -> get_num_row_db ();
            if (!isset($_GET['num'])){
                $_GET['num'] = 10;
            }
            $num_r = $_GET['num'];    
            if ($num_row > $_GET['num']){
                for ($a = 0, $b=1; $a < $num_row; $a+=$_GET['num'], $b++){
                    echo '<li><a href="../admin.php?num='.$num_r.'&action=admin&page='.$b.'" >'.$b.'</a></li>';
                    //echo '<li><a href="#" >'.$b.'</a></li>';
                }
            }    
            ?>
        </ul>
    </div>
</div>