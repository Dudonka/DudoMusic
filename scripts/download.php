
<?php

$errors=array();
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_tmp=$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
$expensions=array('mpr3');
move_uploaded_file($file_tmp,'../res/'.$file_name);

$dest=$_POST['dest'];
$aname=$_POST['artist'];
$sname=$_POST['song'];

include 'connection.php';
mysqli_query($connection," INSERT INTO `songlist` (`aname`, `sname`,`location`) VALUES ('$aname', '$sname','res/$file_name');");
$result=mysqli_query($connection," SELECT * FROM `songlist` WHERE `location`='res/$file_name'");
$song=mysqli_fetch_assoc($result);
$id=$song['id'];
$login=$_COOKIE['login'];
$count = mysqli_query($connection,"SELECT `playlist` FROM `users` WHERE `login`='$login'");
$songs=mysqli_fetch_assoc($count);
$list=$songs['playlist'];
$sing=explode(",",$list);
array_unshift($sing,$id);

$array=implode(",",$sing);

mysqli_query($connection, "UPDATE `users` SET `playlist`='$array' WHERE `users`.`login` ='$login'");


header("Location:../music.php");

//header("Location:../music.php");
?>