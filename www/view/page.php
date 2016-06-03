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
                else {
                    include 'articles.php';
                }
            ?>
        </div>
        <div class="col-lg-3 col-md-3 ">
            <img src="http://placehold.it/250x300">
        </div>
    </div>
</div>

<?php include 'footer.php' ;?>
        
