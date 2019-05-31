<?php


$type=$_POST['type'];
$head=$_POST['head'];
$text=$_POST['text'];


$errors=array();
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_tmp=$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];


move_uploaded_file($file_tmp,'../img/'.$file_name);
include '../scripts/connection.php';


if ($type=="article"or $type=="news" or $type="tab"){
    $result = mysqli_query($connection,"INSERT INTO `articles` (`id`, `name`, `text`, `image`, `type`, `pubdate`, `tags`) VALUES (NULL, '$head', '$text', 'img/$file_name', '$type', CURRENT_TIMESTAMP, '')");
}

if($type=="artist"){
    $result=mysqli_query($connection,"SELECT * FROM `artists` WHERE `name`='$head'");
    if (mysqli_num_rows($result)==0){
        $result=mysqli_query($connection,"INSERT INTO `artists` (`id`, `name`, `text`, `image`, `listenings`) VALUES (NULL, '$head', '$text', 'img/$file_name', '0')");
    }else{

    }
}
header("Location:../admin.php");