<?php
include 'scripts/connection.php';
$login=$_POST['login'];
$password=$_POST['password'];


if ($_POST['input']=="Войти"){
    $count = mysqli_query($connection,"SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'");
    if (mysqli_num_rows($count)==0){
        echo "Fail";

    }
    else{
        ($user=mysqli_fetch_assoc($count));
        setcookie('login', $login, time() + 3345);
        setcookie('password', $password, time() + 3345);
        setcookie('type',$user['type'], time()+3345);
        header("Location:../index.php");
        exit();
    }
}
if ($_POST['input']=="Зарегистрироваться"){
    $count = mysqli_query($connection,"SELECT * FROM `users` WHERE `login`='$login'");
    if (mysqli_num_rows($count)==0){
        mysqli_query($connection," INSERT INTO `users` (`id`, `login`, `password`, `image`, `type`, `playlist`, `albums`) VALUES (NULL, '$login', '$password', '' , 'user', NULL, '')");

        echo 'Зарегистрировались';
    }
    else{
        echo "Занято";

    }

}

?>