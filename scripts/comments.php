<div class="window comments">
<link rel="stylesheet" href="../styles/comments.css">
<?php
include 'scripts/connection.php';
$articleid=$_GET['id'];
$result = mysqli_query($connection,"SELECT * FROM `comments` WHERE `article_id`='$articleid' ORDER BY `pubdate`DESC ");
?>
    <div class="cominput">
<?php

if (isset($_COOKIE['login'])==false){echo '<h3 class="alert-danger">'.'Войдите в аккаунт, чтобы оставить комментарий'.'</h3>';}else{
?>

    <form method="get" action="../scripts/createcom.php" >

        <textarea name="comment" placeholder="Введите комментарий"></textarea><br>
        <input type="hidden" name="id" value="<?php echo $articleid?>">
        <input name='input' type="submit" value="Отправить">
    </form>


<?php
}
?>
</div>
<?php
while (($comment=mysqli_fetch_assoc($result)))
{?>
<div class="text-black-50 alert-info" >
    <?php
    if ($_COOKIE['type']=="admin"){ echo '<a class="float-right" href="scripts/deleteCom.php?id='.$comment['id'].'">Удалить Комментарий</a>';}
    echo '<h4>'.$comment['login'].'</h4>';

    echo $comment['text'];
    ?>
</div>
    <?php
}
?>
</div>


