<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9">
            <?php 
                if (isset ($_GET['id'])){
                    include 'article.php';
                }
                else if ($_GET['action']=='lc') {
                    include 'user.php';
                }
                else if ($_GET['action']=='add') {
                    include 'adm_article.php';
                }
                else if ($_GET['action']=='edit') {
                    include 'adm_article.php';
                }
                else if ($_GET['action'] == 'admin') {
                    include 'adm_articles.php';
                }
                else {
                    include 'articles.php';
                }
            ?>
            
            <?php if (empty($_GET['action']) && empty($_GET['id'])): ?>
            <div>
                <ul class="pagination">
                <?php
                    $row = new Post (HOST, USER, PASS, DB);
                    $num_row = $row -> get_num_row_db ();
                    $lim = 3;
                    $num_pages = $num_row/$lim;
                    $pages = 6;
                    $z=5;
                    if (!isset($_GET['page'])) {
                        for ($a = 1; $a < $pages; $a++) {
                            echo '<li><a href="index.php?page='.$a.'&qqq='.$a.'" >'.$a.'</a></li>';
                        }
                    }
                    else {
                        $n_p = $_GET['page'];
                        if ($_GET['page'] < 4){
                            for ($a = 1; $a < $pages; $a++) {
                                echo '<li><a href="index.php?page='.$a.'&qqq='.$a.'" >'.$a.'</a></li>';
                            }
                        }
                        else if ($_GET['page'] > ($num_pages-$lim)){
                            for ($a = 1; $a < $pages; $a++) {
                                $z-=1;
                                echo '<li><a href="index.php?page='.($num_pages-$z).'&qqq='.$a.'" >'.($num_pages-$z).'</a></li>';
                            }
                        }
                        else if ($_GET['page'] == 8 && $_GET['qqq'] >3){
                            for ($a = 1; $a < $pages; $a++) {
                                $z-=1;
                                echo '<li><a href="index.php?page='.($num_pages-$z).'&qqq='.$a.'" >'.($num_pages-$z).'</a></li>';
                            }
                        }
                        else if ($_GET['page'] == 4 && $_GET['qqq'] < 3){
                            for ($a = 1; $a < $pages; $a++) {
                                echo '<li><a href="index.php?page='.$a.'&qqq='.$a.'" >'.$a.'</a></li>';
                            }
                        }
                        else if ($_GET['page']>=4){
                            for ($a = 1; $a < $pages; $a++) {
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
            <br><br>
            <img src="http://placehold.it/250x150">
            <br><br>
            <img src="http://placehold.it/250x250">
            <br><br>
            <img src="http://placehold.it/250x350">
        </div>      
    </div>
</div>

<?php include 'footer.php' ;?>
        
