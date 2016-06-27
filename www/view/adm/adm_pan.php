<?php include 'view/page/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <a href="../../admin.php?action=admin">Управление постами</a><br>
            <a href="../../admin.php?action=add">Добавить пост</a><br>
            <a href="../../admin.php?action=users">Управление пользователями</a><br>
            
            
            
        </div>
        <div class="col-lg-9 col-md-9">
            <?php 
            if ($_GET['action'] == "admin") {
                include 'ctrl_posts.php';
            }
            else if ($_GET['action'] == 'add' or $_GET['action'] == 'edit') {
                include 'add_post.php';
            }
            else if ($_GET['action'] == 'users') {
                include 'ctrl_users.php';
            }
            else if ($_GET['action'] == 'edit_u') {
                include 'edit_user.php';
            }
            ?>
            
        </div>
    </div>
</div>


<?php include 'view/page/footer.php'; ?>
        
