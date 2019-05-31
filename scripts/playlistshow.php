<?php
include 'connection.php';
$songs;
$result=mysqli_query($connection,"SELECT * FROM `playlists` WHERE `id`=1");

while (($playlist=mysqli_fetch_assoc($result))){
    $songs=explode(",",$playlist['songlist']);
}

for ($i=0;$i<count($songs);$i++){
    $result=mysqli_query($connection,"SELECT * FROM `songlist` WHERE `id`='$songs[$i]'");
    while (($song=mysqli_fetch_assoc($result))){
        $number++;
        ?>
        <li class="nav" ><button style="margin: 0; width: 3%; background: none;border: none;" id="song<?php echo $number?>" value="<?php echo $song['location']?>" onclick="change('<?php echo $song['location']?>','<?php echo $number?>')"><img id="img<?php echo $number?>" src="play.png"></button>
        <?php
        echo '<a href="../artistpage.php?name='.$song['aname'].'" >'.$song['aname'].'</a> - '.$song['sname'].'</li>';
}}