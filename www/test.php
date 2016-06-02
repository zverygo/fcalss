<?php include 'view/header.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../public/js/bootstrap.js"></script>
    <div class="container">
        <div class="row">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#post_plus" data-toggle="tab">Добавить пост</a></li>
                    <li><a href="#posts_ctrl" data-toggle="tab">Управление постами</a></li>
                    <li><a href="#users_ctrl" data-toggle="tab">Управление пользователями</a></li>
                </ul>
                <div class="tab-content">
                    <!-- Вкладка отвечающая за добавлениепостов-->
                    <div class="tab-pane fade in active" id="post_plus">
                        <div class="container">
                            <div class="row bs-example">
                                 <form method="post" action="index.php">
                                    <caption>Название поста.</caption>
                                    <input type="text" class="form-control" placeholder="Text input" name="name_post" autofocus>
                                    <br>
                                    <caption>Тело поста.</caption>
                                    <textarea class="form-control" rows="10" placeholder="Textarea" name="body_post"></textarea>
                                    <br>
                                    <input type="submit" value="Сохранить" class="btn">
                                </form>
                            </div>
                        </div>    
                    </div>
                    <!-- Вкладка отвечающая за управление постами -->
                    <div class="tab-pane fade" id="posts_ctrl">
                        
                    </div>
                    
                    <div class="tab-pane fade" id="users_ctrl">
                        <p>Управление пользователями</p>
                    </div>
                </div> 
            </div>
        </div>    
    </div>


<?php include 'view/footer.php'; ?>