<?php
if ($_COOKIE['login']=='') {
    header("Location:../wellcome.php");
}

 include 'includes/header.php';

?>

<main>
<div class="container p-1">
<!--    Популярное статьи и исполнители-->
<div class="row p-1" >
        <div class="border m-2 col  bg-white"><?php $_GET='news'?>
            <a href="allarticlesview.php?type=news"><h2 class="text-info">Последние новости и релизы</h2></a>
            <div class="row">
                <!--        Вывод последний статей-->
                <?php
                include 'scripts/connection.php';

                $type=$_GET;
                $result = mysqli_query($connection,"SELECT * FROM `articles`  WHERE `type`='$type' ORDER BY `pubdate` DESC limit 4");

                while (($articles=mysqli_fetch_assoc($result)))
                {   ?>
                    <div class="card col-5" style="background: url(<?php echo $articles['image']?>)  no-repeat;background-size:cover; margin-left: 2rem; margin-top: 1rem">
                        <div class="card-body row align-content-end" ><?php
                            echo '<a href="articlepage.php?id='.$articles['id'].'"><h4 class="text-white" style="-webkit-text-stroke: 1px black;">'.$articles['name'].'</h4></a>';
                            echo '<p class="text-white" >'.$articles['pubdate'].'</p>';?>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
        <div class="border m-2 col   bg-white ">
            <h2 class="text-info">Популярные исполнители</h2>

            <div class="row">
                <?php
                $result = mysqli_query($connection,"SELECT * FROM `artists` ORDER BY `listenings` DESC limit 6");

                while (($artist=mysqli_fetch_assoc($result)))
                {   ?>
                    <div class="card col-lg-5 float-left m-3" style="background: url(<?php echo $artist['image']?>)  no-repeat;background-size:cover; height: 7rem">
                       <?php
                            echo '<a  href="artistpage.php?name='.$artist['name'].'"><h4 class="text-white " style="-webkit-text-stroke: 1px black;">'.$artist['name'].'</h4></a>';?>

                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
</div>


<!--Популярные песни и табы   -->
    <div class="row " >
        <div class="border m-2 col float-left bg-white"><?php $_GET='news'?>
            <h2 class="text-info">Популярные табы</h2>
            <?php
            $result = mysqli_query($connection,"SELECT * FROM `articles` WHERE `type`='tab' limit 4");

            while (($articles=mysqli_fetch_assoc($result)))
            {   ?>
            <div class="card col-5 float-left" style="background: url(<?php echo $articles['image']?>)  no-repeat;background-size:cover; margin-left: 2rem; margin-top: 1rem; height: 8rem;">
                <?php
                //        echo '<img class=" img-fluid "  src='.$articles['image'].' ><br>';?>
                <div class="card-body row align-content-end" ><?php
                    echo '<a href="tab_page.php?id='.$articles['id'].'"><h4 class="text-white" style="-webkit-text-stroke: 1px black;">'.$articles['name'].'</h4></a>';
                    //            echo '<p >'.mb_substr($articles['text'],0,240, 'utf-8'); echo "...".'</p><br>';
                    echo '<p class="text-white" >'.$articles['pubdate'].'</p>';?>
                </div>
            </div>

            <?php
                }
                ?>


        </div>

        <div class="border m-2 col float-left bg-white">
            <h2 class="text-info">Популярные песни</h2>



                <?php
                $result=mysqli_query($connection,"SELECT * FROM `songlist` ORDER BY `listening` DESC limit 10");
                ?>
                <nav class="" style="width: 100%; ">
                    <ul><?php
                        while (($song=mysqli_fetch_assoc($result)))
                        {$number++;
                        ?>
                        <li style="display: block"><button class="btn btn-link m-1" style="padding: 0"  id="song<?php echo $number?>" value="<?php echo $song['location']?>" onclick="change('<?php echo $song['location']?>','<?php echo $number?>')"><img id="img<?php echo $number?>" src="play.png"></button>
                            <?php
                            echo '<a href="../artistpage.php?name='.$song['aname'].'" >'.$song['aname'].'</a> - '.$song['sname'].'<div class="float-right" style="margin-left: 1rem">'.$song['listening'].'</div></li>';

                            }
                            ?><br>
                    </ul>
                </nav>
            </div>
    </div>
    <div><audio id="player" controls='controls'src="" preload="auto" style="width: 90%; margin: 3%" /></div>
    </div>

<!--Подключение бустрапа-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<!--Подключаю скрипт плеера-->
<script src="scripts/player.js"></script>

</main>
<footer>

</footer>
</body>
</body>