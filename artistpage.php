
<?

if ($_COOKIE['login'] == '') {
    header("Location:../wellcome.php");
}

include 'includes/header.php';

?>
<main class="p-2">

    <div class="container border  bg-white">

        <?php
        include 'scripts/connection.php';

        $artistname=$_GET['name'];
        $result = mysqli_query($connection,"SELECT * FROM `artists` WHERE `name`='$artistname'");

        while (($artist=mysqli_fetch_assoc($result)))
        {?><div style="margin: 20px;"><?php
            echo '<img class="float-left m-3" style="margin-top:20px;" src='.$artist['image'].'>';
            echo '<h2 class="float-left m-3">'.$artist['name'].'</h2>';
            echo '<h6 class="float-right m-4" >Прослушиваний: '.$artist['listenings'].'</h6>';
            echo '<p class="float-left">'.str_replace("\n",'<br>',$artist['text']).'</p>';?>
        </div><?php
        }
        ?>
        <button id="crt_list"></button>

        <div class="float-left" style="margin-left: 2rem">
            <h2>Альбомы</h2>
            <div class="row">
                <style> .playlist{  width: 200px;height: 190px; background-size: cover; border-radius: 6px; margin-right: 1rem;}</style>
                <?php
                $result = mysqli_query($connection,"SELECT * FROM `artists` WHERE `name`='$artistname'");
                while (($artist=mysqli_fetch_assoc($result)))
                {
                    $playlists=explode(",",$artist['albums']);
                    for ($i=0;$i<=count($playlists);$i++){
                        $result=mysqli_query($connection,"SELECT * FROM `playlists` WHERE `id`='$i'");
                        while (($list=mysqli_fetch_assoc($result))){
                            echo '<button type="button" class="playlist" value="'.$list['id'].'" class="btn btn-info m-2" data-toggle="modal" data-target="#exampleModal-p" style="background: url('.$list['image'].') no-repeat">
            <h2 class="text-white">'.$list['name'].'</h2>
        </button>';
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



        <div><audio id="player" controls='controls'src="" preload="auto" style="width: 90%; margin: 3%" /></div>

        <?php
        $_GET['search']=$artistname;
        include 'scripts/msearch.php';
        ?>


<!--Подключение бустрапа-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
        <script src="scripts/player.js"></script>
</main>
<footer>

</footer>
</body>
</html>