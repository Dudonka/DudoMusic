<?php
$id=$_GET['id'];
include 'connection.php';
mysqli_query($connection,"DELETE FROM `articles` WHERE `articles`.`id` = '$id'");
header("Location:../index.php");