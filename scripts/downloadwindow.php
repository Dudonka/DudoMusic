<?php if (isset($_COOKIE['login'])==true){ ?>

    <button type="button" class="btn btn-primary float-right" style="margin-right: 4rem; margin-top: 3rem" data-toggle="modal" data-target="#exampleModal">
        Загрузка
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div>
                    <?php
                    if (isset($_FILES['file'])){
                        $errors=array();
                        $file_name=$_FILES['file']['name'];
                        $file_size=$_FILES['file']['size'];
                        $file_tmp=$_FILES['file']['tmp_name'];
                        $file_type=$_FILES['file']['type'];
                        $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
                        $expensions=array('mpr3');
                        move_uploaded_file($file_tmp,'res/'.$file_name);
                    }
                    ?>
                    <form enctype="multipart/form-data" action="../scripts/download.php" method="POST">
                        Выберите файл: <input name="file" type="file"/><br><br>


                        <input type="text" placeholder="Введите имя исполнителя" name="artist"><br><br>
                        <input type="text" placeholder="Введите название песни" name="song"><br><br>
                        <input type="submit" value="Загрузить" />
                        <input style="visibility: hidden;" name="dest" value="res/<?php echo "$file_name"?>">
                    </form>
                </div>

            </div>
        </div>
    </div>
   <?php }?>




