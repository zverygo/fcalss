<?php include_once 'header.php'; ?>

<div class="container">
    <h5> ЗАРЕГЕСТРИРУЙСЯ ВО МНЕ ПОЛНОСТЬЮ </h5>
    <form method="post">
        <div class="form-group">
            <label>E-MAIL</label>
            <br>
            <input type="email" name="email" class="form-item" value="" autofocus required>
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
        <input type="submit" value="REGISTER" class="btn">
    </form>
</div>
    
<?php include_once 'footer.php'; ?>