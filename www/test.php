<?php include 'view/header.php'; ?>

<div class="container">
    <table class="table table-striped">
    <?php for ($a = 0, $b = 1; $a<5; $a++, $b++) : ?>
        <table class="table table-striped">
        <tr>
            <td>1</td>
            <td>
                <a href="#<?= $a ?>" data-toggle="collapse">11</a>
                <!--<div class="collapse" id="<?= $a ?>">
                    <div class="well">
                        <p>1111111111111111111111</p>
                    </div>
                </div>-->
            </td>
            <td><a href="#" data-toggle="modal" data-target="#<?= $b ?>">Редактировать</a></td>
            <td><a href="#">Удалить</a></td>
        </tr>
             <table class="table table-striped">
        <tr>
            <td>
                <div class="collapse" id="<?= $a ?>">
                    <div class="well">
                        <p>1111111111111111111111</p>
                    </div>
                </div>
            </td>
        </tr>
        </table>
            
        <div class="modal fade" id="<?= $b ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="modal-title">Нaзвание окна <?= $b ?></h4>
                </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <img src="http://placehold.it/240x360" alt="" class="hidden-xs">
                                    <br> <!-- два br чтоб текст не сливался с картинкой-->
                                    <br>
                                    <p><em>11111 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</em></p>
                                </div>
                                <div class="row col-lg-8 col-md-8">
                                    <div class="col-lg-6 col-md-6">
                                        <p>2222222 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        <p>3333333 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p>4444444 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        <p>5555555 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Закррыть</button>
                </div>
            </div>
        </div>
    </div>    
            
    <? endfor ?>
    </table>    
</div>
<!-- модальное окно для редактирования статьи -->
   

<?php include 'view/footer.php'; ?>