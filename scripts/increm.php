<?php
$location=$_POST['loc'];
include "connection.php";

mysqli_query($connection,"UPDATE `songlist` SET `listening`=`listening`+1 WHERE `location`='$location'");
echo $location;

$result = mysqli_query($connection,"SELECT * FROM `songlist` WHERE `location`='$location'");

$song=mysqli_fetch_assoc($result);

$aname=$song['aname'];

mysqli_query($connection,"UPDATE `artists` SET `listenings`=`listenings`+1 WHERE `name`='$aname'");