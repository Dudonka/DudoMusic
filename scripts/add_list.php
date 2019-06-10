<?php
include ('connection.php');
$name=$_POST['name'];
$songlist=$_POST['songs'];
if($_POST['artist']!='')
{


}else{
$result = mysqli_query($connection,"INSERT INTO `playlists` (`id`, `name`, `author`, `image`, `songlist`, `type`) VALUES (NULL, '$name', '', '', '$songlist', 'personal');");
$result=mysqli_query($connection, "SELECT * FROM `playlists` ORDER BY `id` DESC limit 1");

while (($list=mysqli_fetch_assoc($result)))
{
    $login=$_COOKIE['login'];
    $count = mysqli_query($connection,"SELECT `albums` FROM `users` WHERE `login`='$login'");
    $playlists=mysqli_fetch_assoc($count);

    $sing=explode(",",$playlists['albums']);
    array_unshift($sing,$list['id']);

    $array=implode(",",$sing);

    mysqli_query($connection, "UPDATE `users` SET `albums`='$array' WHERE `users`.`login` ='$login'");
}}