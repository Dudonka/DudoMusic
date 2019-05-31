<?php

$id = $_GET['id'];
include 'connection.php';
mysqli_query($connection, "DELETE FROM `сomments` WHERE `comments`.`id` = '$id'");
header("Location:../index.php");