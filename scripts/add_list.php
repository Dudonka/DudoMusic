<?php
include ('connection.php');
$name=$_POST['name'];
$songlist=$_POST['songs'];
$artist=$_POST['artist'];

$id;

if($artist!='')
{
    $result = mysqli_query($connection,"INSERT INTO `playlists` (`id`, `name`, `author`, `image`, `songlist`, `type`) VALUES (NULL, '$name', '', '', '$songlist', 'album');");
    $result=mysqli_query($connection, "SELECT * FROM `playlists` ORDER BY `id` DESC limit 1");
    while (($list=mysqli_fetch_assoc($result)))
    {
        $id=$list['id'];
        $count = mysqli_query($connection,"SELECT `albums` FROM `artists` WHERE `name`='$artist'");
        echo $artist;
        $playlists=mysqli_fetch_assoc($count);
        $sing=explode(",",$playlists['albums']);
        array_unshift($sing,$id);
        $array=implode(",",$sing);
        mysqli_query($connection, "UPDATE `artists` SET `albums`='$array' WHERE `name`='$artist'");echo 'dal';
    }





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