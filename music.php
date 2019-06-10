<?php
if ($_COOKIE['login']=='') {
    header("Location:../wellcome.php");
}
?>
<?include 'includes/header.php';

?>
<script src="js/jquery-3.4.1.min.js"></script>

<main class="p-2">
    <div class=" container border bg-white">
<!--        <button onclick="next()" style="margin: 0;width: 0%">next</button>-->
            <div class="float-left"><h3 class="m-3">Поиск:</h3>
            <form method="get" action="music.php">
            <input type="text" name="search" placeholder="Введите название песни или имя исполнителя" style="width: 500px;height: 25px;margin-left: 15px;padding-left: 5px;">
            <input class="btn btn-primary" type="submit" style="padding: 5px;" value="Поиск">
            </form></div>

        <?php include 'scripts/downloadwindow.php';?>

        <!--Подключаю плеер-->
        <div><audio id="player" controls='controls'src="" preload="auto" style="width: 90%; margin: 3%" /></div>
        <!--        <button onclick="next()" style="margin: 0;width: 0%">next</button>-->
        <!--подключаю бд и вывожу песни-->
        <div class="row clearfix">
        <div class="float-left col-7">
        <?php
        $search=$_GET['search'];
        $number=0;
        if ($search==Null){
        include 'scripts/connection.php';
        $login=$_COOKIE['login'];
        $count = mysqli_query($connection,"SELECT `playlist` FROM `users` WHERE `login`='$login'");
        $songs=mysqli_fetch_assoc($count);
        $list=$songs['playlist'];
        $sing=explode(",",$list);
        for ($i=0;$i<=count($sing)-1;$i++){
        $result=mysqli_query($connection,"SELECT * FROM `songlist` WHERE `id`='$sing[$i]'");
        ?>
        <nav>
            <ul><?php
                while (($song=mysqli_fetch_assoc($result)))
                {$number++;
                ?>
                <li class="nav" ><button style="margin: 0; width: 3%; background: none;border: none;margin-right: 5px" id="song<?php echo $number?>" value="<?php echo $song['location']?>" onclick="change('<?php echo $song['location']?>','<?php echo $number?>')"><img id="img<?php echo $number?>" src="play.png"></button>
                    <?php
                    echo '<a href="../artistpage.php?name='.$song['aname'].'" >'.$song['aname'].'</a> - '.$song['sname'].'</li>';
                    echo '<div class="lyr_text"><button class="lyric btn btn-light" onclick="text('.$song['id'].','.$number.')">Посмотреть текст</button><p class="p_lyr'.$number.'"></p></div>';
                    }
                    ?>
            </ul>
        </nav><?php }}
        else {
            include 'scripts/msearch.php';
        }
        ?>
    </div>

    <div class="float-right">
        <div><h2>Плейлисты</h2><button type="button" id="crt_list" class="btn btn-info m-2" data-toggle="modal" data-target="#exampleModal-p">Создать</button></div>
        <div class="row">
        <style> .playlist{  width: 200px;height: 190px; background-size: cover; border-radius: 6px; margin-right: 1rem;}</style>
        <?php
        $result=mysqli_query($connection, "SELECT `albums` FROM `users` WHERE `login`='$login'");
        while (($p_list=mysqli_fetch_assoc($result)))
        {
            $playlists=explode(",",$p_list['albums']);

            for ($i=0;$i<=count($playlists);$i++){
                $result=mysqli_query($connection,"SELECT * FROM `playlists` WHERE `id`='$playlists[$i]'");
                while (($list=mysqli_fetch_assoc($result))){
                    if($list['image']==''){$list['image']="img/vinyl.png";}
                echo '<div class="col"><button type="button" class="playlist" value="'.$playlists[$i].'" class="btn btn-info m-2" data-toggle="modal" data-target="#exampleModal-p" style="background: url('.$list['image'].') no-repeat">
            <h2 class="text-white">'.$list['name'].'</h2>
        </button></div>';
                }
            }
        }
        ?></div>
        <div class="modal" id="exampleModal-p" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="scripts/player.js"></script>

    </div>
    </div>


<!--Подключение бустрапа-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</main

<footer>

</footer>
</body>
</html>