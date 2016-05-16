<?php include_once 'header.php'; ?>

        <div class="container">
            <form method="post" action="../admin/admin.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                <div class="form-group">
                    <label>Название</label>
                    <br>
                    <input type="text" name="title" value="<?=$text['title']?>" class="form-item" autofocus required>
                </div>
                <div class="form-group">
                    <label>Дата</label>
                    <br>
                    <input type="date" name="date" value="<?=$text['date']?>" class="form-item" required>
                </div>
                <div class="form-group">
                    <label>Содержание</label>
                    <br>
                    <textarea class="form-item" name="content" required><?=$text['content']?></textarea>
                </div>
                <input type="submit" value="Save" class="btn">
            </form> 
        </div>

<?php include_once 'footer.php'; ?>