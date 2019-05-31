<?php
include 'connection.php';
$comment=$_GET['comment'];
$id=$_GET['id'];
$login=$_COOKIE['login'];

mysqli_query($connection," INSERT INTO `comments` (`id`, `login`, `text`, `pubdate`, `article_id`) VALUES (NULL, '$login', '$comment', CURRENT_TIMESTAMP, '$id')");

header("Location:../articlepage.php?id=$id");


