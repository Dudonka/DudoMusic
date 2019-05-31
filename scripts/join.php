<?php
$id=$_POST['id'];
echo $id;
include 'connection.php';

$login=$_COOKIE['login'];
$count = mysqli_query($connection,"SELECT `playlist` FROM `users` WHERE `login`='$login'");
$songs=mysqli_fetch_assoc($count);
$list=$songs['playlist'];
$sing=explode(",",$list);
array_unshift($sing,$id);

$array=implode(",",$sing);

mysqli_query($connection, "UPDATE `users` SET `playlist`='$array' WHERE `users`.`login` ='$login'");

exit();
