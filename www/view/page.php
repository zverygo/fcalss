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
                    /*$row = new Post (HOST, USER, PASS, DB);
                    $num_row = $row -> get_num_row_db ();
                    for ($a = 0, $b=1; $a < $num_row; $a+=3, $b++){
                        echo '<li><a href="index.php?page='.$b.'" >'.$b.'</a></li>';
                    }*/
                    
                    for ($a = 0; $a < 5; $a++){
                        $b++;
                        echo '<li><a href="index.php?page='.$b.'" >'.$b.'</a></li>';
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
        
