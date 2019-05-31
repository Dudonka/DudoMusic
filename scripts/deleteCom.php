<?php
$id = $_POST['id'];
include 'connection.php';
mysqli_query($connection, "DELETE FROM `comments` WHERE `id` = '$id'");
echo $id;
//header("Location:../index.php");