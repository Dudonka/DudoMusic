<?php
include 'scripts/connection.php';
$search=$_GET['search'];

$count = mysqli_query($connection,"SELECT * FROM `songlist` WHERE `aname`='$search' OR `sname`='$search'");
$number=0;
?>
    <nav>
        <ul>
            <?php
            while (($song=mysqli_fetch_assoc($count)))
            {$number++;
            ?>
                <li class="d-block" ><button style="margin: 0; width: 3%; background: none;border: none;" id="song<?php echo $number?>" value="<?php echo $song['location']?>" onclick="change('<?php echo $song['location']?>','<?php echo $number?>')"><img id="img<?php echo $number?>" src="play.png"></button>
                <?php
                echo '<a href="../artistpage.php?name='.$song['aname'].'" >'.$song['aname'].'</a> - '.$song['sname'];
                ?> <button style="float:right;margin-right:50%; margin-top: 20px;height: 20px;width: 20px;background-size: cover;border: none;background-color: white" class="done " value="<?php echo $song['id']?>"><img src="add.png"></button><br><br></li><?php
                }
                ?>
        </ul>
    </nav><?php



?>
<script src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">




</script>

<script src="../js/jquery-3.4.1.min.js"></script>