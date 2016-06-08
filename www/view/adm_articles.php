        <div class="row">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#posts_ctrl" data-toggle="tab">Управление постами</a></li>
                    <li><a href="#post_plus" data-toggle="tab">Добавить пост</a></li>
                    <li><a href="#users_ctrl" data-toggle="tab">Управление пользователями</a></li>
                </ul>
                <div class="tab-content">
                   
                    <!-- Вкладка отвечающая за управление постами -->
                    <div class="tab-pane fade in active" id="posts_ctrl">
                        <p>Управление постами</p>
                            <table class="table table-striped">
                            <tr>
                                <th>№</th>
                                <th>Дата и время</th>
                                <th>Заголовок</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php foreach($text as $a): ?>
                            <? $b+=1; ?>    
                            <tr>
                                <td><?= $b ?></td>
                                <td><?=$a['date']?></td>
                                <td>
                                    <a href="#<?= $a['id'] ?>" data-toggle="collapse"><?=$a['title']?></a>
                                    <div class="row collapse" id="<?= $a['id'] ?>">
                                        <div class="well">
                                            <p><?=$a['content']?></p>
                                        </div>
                                    </div>
                                </td>
                                <!--<td><a href="../admin/admin.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>-->
                                <td><a href="#" data-toggle="modal" data-target="#<?= $b ?>">Редактировать</a></td>
                                <td><a href="../admin/admin.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
                            </tr>
                            <!--                                  -->
                            <div class="modal fade" id="<?= $b ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" type="button" data-dismiss="modal">
                                                <i class="fa fa-close"></i>
                                            </button>
                                            <h4 class="modal-title"><?=$a['title']?> <?= $a['id'] ?></h4>
                                        </div>
                                            <div class="modal-body">
                                                <p>
                                                    <?= $a['content'] ?>
                                                </p>
                                            </div>    
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Закррыть</button>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                            <?php endforeach ?>
                         </table>
                    </div>
                     <!-- Вкладка отвечающая за добавлениепостов--> 
                    <div class="tab-pane fade" id="post_plus">
                        <form method="post" action="../admin/admin.php?action=add">
                            <div class="form-group">
                                <label>Название</label>
                                <br>
                                <input type="text" name="title" value="<?=$text['title']?>" class="form-control" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>Содержание</label>
                                <br>
                                <textarea class="form-control" name="content" required><?=$text['content']?></textarea>
                            </div>
                            <input type="submit" value="Save" class="btn">
                        </form> 
                    </div>

                    
                    <!-- Вкладка отвечающая за управление постами -->
                    <div class="tab-pane fade" id="users_ctrl">
                        <p>Управление пользователями</p>
                         
                    </div>
                </div> 
            </div>
        </div>   