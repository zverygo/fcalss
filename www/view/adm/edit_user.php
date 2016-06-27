<div>
    <h5> ОТРЕДАКТИРОВАТЬ ДАННЫЕ ПОЛЬЗОВАТЕЛЯ </h5>
    <form method="post" action="../reg/reg.php?action=<?=$_GET['action']?>&id_u=<?=$_GET['id_u']?>">
        <table>    
            <tr>
                <th>Full Name</th>
                <td><input type="text" name="full_name" class="form-item" value="<?=$text['full_name'] ?>" autofocus required></td>
            </tr>
            <tr>
                <th>E-MAIL</th>
                <td><input type="email" name="email" class="form-item" value="" required></td>
            </tr>
            <tr>
                <th>PASSWORD</th>            
                <td><input type="password" name="password" class="form-item" value="" required></td>
            </tr>
            <tr>
                <th>REPEAT PASSWORD</th>
                <td><input type="password" name="r_password" class="form-item" value="" required></td>
            </tr>
            <tr>
                <th>About</th>
                <td><input type="text" name="about" class="form-item" value="<?=$text['about'] ?>"></td>
            </tr>
        </table>
    </form>
</div>