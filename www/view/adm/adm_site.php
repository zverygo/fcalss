<?php
$adm = new Admin (HOST, USER, PASS, DB);
$cap = $adm -> tech_work ();

?>
<div>
    <table>
        <?php if($cap['value'] == 0) : ?>
            <tr>
                <th>
                    Выключить сайт
                </th>
                <td>
                    <form method="get">
                        <button class="btn btn-default" type="submit" name="cap" value="off">APPLY</button>
                    </form>
                </td>
            </tr>
        <?php endif ?>
        <?php if($cap['value'] == 1) : ?>
            <tr>
                <th>
                    Включить сайт
                </th>
                <td>
                    <form method="get">
                        <button class="btn btn-default" type="submit" name="cap" value="on">APPLY</button>
                    </form>
                </td>
            </tr>
        <?php endif ?>
        
        
        
        
    </table>
</div>
