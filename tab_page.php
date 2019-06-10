<?php
include 'includes/header.php'; ?>
<main class="p-2">
    <div class="container border bg-white  " >




        <?php
        include 'scripts/connection.php';
        $tab_id=$_GET['id'];
        $result = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id`='$tab_id'");


        while (($tab=mysqli_fetch_assoc($result)))
        {   if ($_COOKIE['type']=="admin"){ echo '<a href="scripts/deleteArticle.php?id='.$articleid.'">Удалить</a>';}
            ?><div class="m-2 row btn-group-vertical"><?php
            echo '<h2 class="float-left m-3">'.$tab['name'].'</h2><br>';
            echo '<div class=""><img class="float-left m-3"  src='.$tab['image'].'></div><br>';
        }
        ?>
    </div>
    <?include 'scripts/comments.php'?>
<!--Подключение бустрапа-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

</main>

<footer>

</footer>
</body>
</html>