<div class="container">
    <h5> ЗАРЕГЕСТРИРУЙСЯ ВО МНЕ ПОЛНОСТЬЮ </h5>
    <form method="post" action="../reg/reg.php?action=<?=$_GET['action']?>">
        <div class="form-group">
            <label>Full Name</label>
            <br>
            <input type="text" name="full_name" class="form-item" value="<?=$text['full_name'] ?>" autofocus required>
        </div>
        <?php if(empty($_SESSION['login'])) : ?>
        <div class="form-group">
            <label>E-MAIL</label>
            <br>
            <input type="email" name="email" class="form-item" value="" required>
        </div>
        <div class="form-group">
            <label>PASSWORD</label>
            <br>
            <input type="password" name="password" class="form-item" value="" required>
        </div>
        <div class="form-group">
            <label>REPEAT PASSWORD</label>
            <br>
            <input type="password" name="r_password" class="form-item" value="" required>
        </div>
        <? endif ?>
        <div class="form-group">
            <label>About</label>
            <br>
            <input type="text" name="about" class="form-item" value="<?=$text['about'] ?>">
        </div>
        <?php
        if(empty($_SESSION['login']))
            echo '<input type="submit" value="REGISTER" class="btn">';
        else
            echo '<input type="submit" value="SAVE" class="btn">';
        ?>
    </form>
</div>