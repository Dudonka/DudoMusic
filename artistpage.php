
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