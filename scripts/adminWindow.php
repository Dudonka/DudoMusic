<?php
$type=$_POST['type'];

if($type=="article"){echo "<h2>Создать статью</h2>";}
if($type=="news"){echo "<h2>Создать новость</h2>";}
if($type=="artists"){echo "<h2>Создать артиста</h2>";}
if($type=="tab"){echo "<h2>Создать табы</h2>";}

?>


<form  enctype="multipart/form-data" method="post" action="../scripts/adminCreate.php" class="form-group m-3">

    <div class="btn-group-vertical col-lg-6">
        <p style="color: red">Все поля должны быть заполнены</p>
        <input class="invisible" name="type" value="<?php echo $type;?>">
        <input type="text" name="head" placeholder="Введите заголовок"><br>
        <textarea style="width: 30rem" name="text" placeholder="Введите текст"></textarea><br>
        Выберите файл: <input name="file" type="file"/><br><br>

        <input type="submit" value="Создать">
    </div>
</form>
<?php
if (isset($_FILES['file'])){
    $errors=array();
    $file_name=$_FILES['file']['name'];
    $file_size=$_FILES['file']['size'];
    $file_tmp=$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

    move_uploaded_file($file_tmp,'res/'.$file_name);
}
?>