<?php
if ($_COOKIE['login']=='') {
    header("Location:../wellcome.php");
}
include 'includes/header.php';
include 'scripts/connection.php';
$word=$_GET['search'];

?>

<main>

    <div class="container p-1">

        <div class="border m-2 col  bg-white ">
            <h3 class="m-1">По запросу "<?php echo $word ?>" найдено</h3><br>

<!--                Найденные артисты-->
                <?php
                $result = mysqli_query($connection,"SELECT * FROM `artists` WHERE `name`='$word' ORDER BY `listenings` DESC");
                echo '<h4>Исполнители:</h4><div class=" m-1 ">';
                if(mysqli_num_rows($result)==0){
                    echo "Не найдено";
                }else{

                while (($artist=mysqli_fetch_assoc($result)))
                {   ?>
                    <div class="card m-1 col-2" style="background: url(<?php echo $artist['image']?>)  no-repeat;background-size:cover; height: 7rem">
                        <div class="card-body row align-content-end" style="margin-top: 4rem" ><?php
                            echo '<a  href="artistpage.php?name='.$artist['name'].'"><h4 class="text-white " style="-webkit-text-stroke: 1px black;">'.$artist['name'].'</h4></a>';?>
                        </div>
                    </div><br><br>

                    <?php
                }}


                ?><div><?php
//                Найденные песни
                $result = mysqli_query($connection,"SELECT * FROM `songlist` WHERE `sname`='$word' OR `aname`='$word' ORDER BY `listening` DESC limit 5");
                echo '<h4>Песни:</h4>';

                if(mysqli_num_rows($result)==0){echo "Не найдено";}else{
                echo '<div><audio id="player" controls=\'controls\'src="" preload="auto" style="width: 90%; " /></div><script src="scripts/player.js"></script>';

                ?>
            <nav class="" style="width: 100%; ">
                <ul><?php
                    while (($song=mysqli_fetch_assoc($result)))
                    {$number++;
                    ?>
                    <li style="display: block"><button class="btn btn-link m-1" style="padding: 0"  id="song<?php echo $number?>" value="<?php echo $song['location']?>" onclick="change('<?php echo $song['location']?>','<?php echo $number?>')"><img id="img<?php echo $number?>" src="play.png"></button>
                        <?php
                        echo '<a href="../artistpage.php?name='.$song['aname'].'" >'.$song['aname'].'</a> - '.$song['sname'].'</li>';
                        }}
                        ?><br><?php if($number==5){
                            ?><a href="music.php?search=<?php echo $word;?>">Посмотреть все песни</a><?php
                        } ?>
                </ul>

            </div
            </nav>


<!--            Найденные статьи и новости-->

            <h4>Статьи и новости:</h4>
            <div class="row">
            <?php
            $result = mysqli_query($connection,"SELECT * FROM `articles`");
            $row=0;
            $done=false;
            while (($article=mysqli_fetch_assoc($result))) {

            $row++;

                $list=explode(",",$article['tags']);
                if(in_array(ucwords($word),$list)){
                    $article_id=$article['id'];
                    $count= mysqli_query($connection,"SELECT * FROM `articles` WHERE `id`='$article_id'");
                    while (($articles=mysqli_fetch_assoc($count)))
                    {   ?>
                        <div class="card col-2 " style="background: url(<?php echo $articles['image']?>)  no-repeat;background-size:cover; margin-left: 2rem; margin-top: 1rem">
                            <div class="card-body row align-content-end" ><?php
                                echo '<a href="articlepage.php?id='.$articles['id'].'"><h4 class="text-white" style="-webkit-text-stroke: 1px black;">'.$articles['name'].'</h4></a>';
                                $done=true;
                                echo '<p class="text-white" >'.$articles['pubdate'].'</p>';?>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            if($done==false){
                echo "<p style='margin-left: 1rem'>Не найдено</p>";
            }
            ?>
            </div>
             </div>
            </div>
        </div>
    </div>

    <!--Подключение бустрапа-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

</main>
<footer>

</footer>