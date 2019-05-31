<?php
include 'connection.php';
$id=$_POST['id'];

$count = mysqli_query($connection,"SELECT `lyrics` FROM `songlist` WHERE `id`='$id'");
while (($song=mysqli_fetch_assoc($count))) {
    echo $song['lyrics'];
}