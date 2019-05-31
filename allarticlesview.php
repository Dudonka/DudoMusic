<?php
if ($_COOKIE['login']=='') {
    header("Location:../wellcome.php");
}
?>


<?php
include 'includes/header.php';
?><main><div class="container p-1"><?php
include 'scripts/connection.php';
$type=$_GET['type'];
$result = mysqli_query($connection,"SELECT * FROM `articles` WHERE `type`='$type' ORDER BY `pubdate` DESC");
if ($type=='article'){
    echo '<h2 style="color: yellow">Статьи</h2>';
}
if ($type=='news'){
    echo '<h2 style="color: yellow">Новости</h2>';
}
if ($type=='tab'){
    echo '<h2 style="color: yellow">Табы</h2>';
}
while (($articles=mysqli_fetch_assoc($result)))
{   ?><link rel="stylesheet" href="styles/allarticles.css">
    <div class="article clearfix border bg-white">
    <?php
        $rem='';
        if($type=="tab"){$rem="height:20rem";}
        echo '<img src='.$articles['image'].' style="float:left;'.$rem.'"><br>';?>
        <div class="articletext"><?php
            if ($type=='tab'){echo '<a href="tab_page.php?id='.$articles['id'].'"><h4>'.$articles['name'].'</h4></a>';}else{
                echo '<a href="articlepage.php?id='.$articles['id'].'"><h4>'.$articles['name'].'</h4></a>';
            }

            echo '<p class="articletext">'.mb_substr($articles['text'],0,250, 'utf-8'); echo "...".'</p><br>';
            echo '<p style="float: right;padding-bottom: 10px;">'.$articles['pubdate'].'</p>';?>
        </div>
    </div>
<?php
}
?>
</div>
    <!--Подключение бустрапа-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</main>

