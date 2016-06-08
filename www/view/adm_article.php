<form method="post" action="../admin/admin.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
    <div class="form-group">
        <label>Название</label>
        <br>
        <input type="text" name="title" value="<?=$text['title']?>" class="form-control" autofocus required>
    </div>
    <div class="form-group">
        <label>Содержание</label>
        <br>
        <textarea class="form-control" name="content" required><?=$text['content']?></textarea>
    </div>
    <input type="submit" value="Save" class="btn">
</form>