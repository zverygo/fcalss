<?php include 'page/header.php'; ?>
<div class="container">
    <?php if (!isset($_GET['cap'])) : ?>
    <div class="row">
        <div class="col-lg-9 col-md-9">
            <?php 
                if (isset ($_GET['id'])){
                    include 'page/article.php';
                }
                else if ($_GET['action']=='lc') {
                    include 'usr/user.php';
                }
                else if (isset($_GET['tag'])) {
                    if ($_GET['tag'] == 'all') {
                        include 'test/test.php';
                    }
                    else  {
                        include 'page/articles.php';
                    }
                }
                else if ( $_GET['action'] == 'log') {
                    include 'usr/login.php';
                }
                else if ( $_GET['action'] == 'reg') {
                    include 'usr/register.php';
                }
                else {
                    include 'page/articles.php';
                }
            ?>
            
            <?php if (empty($_GET['action']) && empty($_GET['id'])): ?>
            <div>
                <ul class="pagination">
                <?php
                    $row = new Post (HOST, USER, PASS, DB);
                    $num_row = $row -> get_num_row_db ();
                    $lim = 3;
                    $num_pages = (int) ($num_row/$lim);
                    $pages = 5;
                    $z=5;
                    $block = (int) (($num_pages/$pages)+1);
                    if (!isset($_GET['page'])) {
                        for ($a = 1; $a <= $pages; $a++) {
                            echo '<li><a href="index.php?page='.$a.'&qqq='.$a.'" >'.$a.'</a></li>';
                        }
                    }
                    else {
                        $n_p = $_GET['page'];
                        if ($_GET['page'] <= 4){
                            for ($a = 1; $a <= $pages; $a++) {
                                echo '<li><a href="index.php?page='.$a.'&qqq='.$a.'" >'.$a.'</a></li>';
                            }
                        }
                        else if ($_GET['page'] > ($num_pages-$lim)){
                            for ($a = 1; $a <= $pages; $a++) {
                                $z-=1;
                                echo '<li><a href="index.php?page='.($num_pages-$z).'&qqq='.$a.'" >'.($num_pages-$z).'</a></li>';
                            }
                        }//////////////////////////////////
                        else if ($_GET['page'] >= ($num_pages-3) && $_GET['qqq'] >3){
                            for ($a = 1; $a <= $pages; $a++) {
                                $z-=1;
                                echo '<li><a href="index.php?page='.($num_pages-$z).'&qqq='.$a.'" >'.($num_pages-$z).'</a></li>';
                            }
                        }////////////////////////////////////
                        else if ($_GET['page'] == 4 && $_GET['qqq'] < 3){
                            for ($a = 1; $a <= $pages; $a++) {
                                echo '<li><a href="index.php?page='.$a.'&qqq='.$a.'" >'.$a.'</a></li>';
                            }
                        }
                        else if ($_GET['page']>=4){
                            for ($a = 1; $a <= $pages; $a++) {
                                if ($_GET['qqq'] > 3) {
                                    echo '<li><a href="index.php?page='.($n_p+$a).'&qqq='.$a.'" >'.($n_p+$a).'</a></li>';
                                }
                                else {
                                    $z-=1;
                                    echo '<li><a href="index.php?page='.($n_p-$z).'&qqq='.$a.'" >'.($n_p-$z).'</a></li>';
                                }
                            }
                        }
                    }
                ?>    
                </ul>
            </div>
                    
            <?php endif ?>
            
        </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <br>
            <div class="block">
                <h4>BEST POST</h4>
                <?php
                    $row = new Post (HOST, USER, PASS, DB);
                    $b_post = $row -> best_post ();
                ?>
                <h4><a href="../index.php?id=<?=$b_post['id']?>"><?=$b_post['title']?></a></h4>
                <em>Опубликовано: <?=$b_post['date']?></em>
                <p><?=$b_post['content']?></p>
            </div>
            <br>
            <div class="block">
                <h4>ПОПУЛЯРНЫЕ РАЗДЕЛЫ</h4>
                <?php
                    $row = new Post (HOST, USER, PASS, DB);
                    $test_2 = $row -> pop_post ();
                ?>
                <?php foreach($test_2 as $a): ?>
                    <table>
                        <tr>
                            <td><?=$a['tag']?></td>
                            <td><?=$a['tag_rat']?></td>
                        </tr>
                    </table>
                <?php endforeach ?>
                <a href="../index.php?tag=all" >все разделы</a>
                
            </div>
            <div>
                <br>
                <img src="http://placehold.it/250x350">
            </div>
        </div>      
    </div>
    <?php endif ?>
    <?php 
        if ($_GET['cap'] == 1) {
            include 'cap/iron.php';
        }
    ?>
</div>

<?php include 'page/footer.php' ;?>
        
