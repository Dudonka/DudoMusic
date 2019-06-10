<?php

include 'connection.php';
$login=$_COOKIE['login'];
$count = mysqli_query($connection,"SELECT `playlist` FROM `users` WHERE `login`='$login'");
$songs=mysqli_fetch_assoc($count);
$list=$songs['playlist'];
$sing=explode(",",$list);
echo '<input id="pls_name" placeholder="Название плейлиста">';
if($_COOKIE['type']=='admin'){echo '<input id="artist" placeholder="Альбом музыканта">';}
echo '<button id="crt_done">Добавить</button>';
for ($i=0;$i<=count($sing)-1;$i++){
    $result=mysqli_query($connection,"SELECT * FROM `songlist` WHERE `id`='$sing[$i]'");
    ?>

    <nav>
    <ul><?php
        while (($song=mysqli_fetch_assoc($result)))
        {$number++;
        ?>
        <li class="nav" ><input type="checkbox" class="check" value="<?php echo $song['id']?>" style="margin-top: 2%" type="radio"><button style="margin: 0; width: 3%; background: none;border: none;margin-right: 5px" id="song<?php echo $number?>" value="<?php echo $song['location']?>" onclick="change('<?php echo $song['location']?>','<?php echo $number?>')"><img id="img<?php echo $number?>" src="play.png"></button>
            <?php
            echo '<a href="../artistpage.php?name='.$song['aname'].'" >'.$song['aname'].'</a> - '.$song['sname'].'</li>';
            }
            ?>
    </ul>
    </nav><?php }?>
<script>

    $("#crt_done").bind("click",function () {
        var songs='';
        var name=$('#pls_name').val();
        var box=$('.check');
        var artist=$('#artist').val();
        alert(box.length);
        for (var i=0;i<=box.length;i++){
            if($(box[i]).prop("checked")==true){
            songs=songs+($(box[i]).attr('value'))+','}
            console.log(songs)
        }
        $.ajax({
            url: "scripts/add_list.php",
            type: "POST",
            data: ({name: name, songs: songs,artist:artist}),
            dataType: "html",
            success: function (data){
                window.location.reload();

            }
        })


    })
</script>
