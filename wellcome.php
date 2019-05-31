<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DudoMusic</title>
    <link rel="shortcut icon" href="img/D.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-image: url(../img/back3.jpg);
            background-size: cover;
            background-attachment: fixed;}
        .element{
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center" style="margin-top: 10rem">
            <h2 class="text-white">Добро пожаловать на </h2>
            <h1 style="color: yellow">DudoMusic</h1>
        </div>
        <div class="text-center">
            <div class="p-1  element d-inline-block border p-3"style="border-radius:7px ">
                <form class="form-group  m-3 d-inline-block">
                    <input id="login" type="text" placeholder="Логин" name="login"><br><br>
                    <input id="password" type="text" placeholder="Пароль" name="password"><br><br>
                    <div id="information"><br></div>
                    <input type="button" id="login_u" value="Войти" >
                </form>
                <form class="form-group m-3 d-inline-block">
                    <input id="r_login" type="text" placeholder="Логин" name="login"><br><br>
                    <input id="r_password" type="text" placeholder="Пароль" name="password"><br><br>
                    <div id="r_information"><br></div>
                    <input type="button" id="registr" value="Зарегистрироваться" >
                </form>
            </div>
        </div>
    </div>
<script src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">


    $(document).ready(function () {
        $("#login_u").bind("click",function () {
            $.ajax({
                url: "login.php",
                type: "POST",
                data: ({login: $("#login").val(),password:$("#password").val(),input: $("#login_u").val()}),
                dataType: "html",
                beforeSend: function(){

                },
                success: function (data){
                    if(data=="Fail"){
                        $("#information").text("Неверный логин или пароль");
                    }else {

                        window.location.href="index.php";
                    }
                }
            })
        })
        $("#registr").bind("click",function () {
            $.ajax({
                url: "login.php",
                type: "POST",
                data: ({login: $("#r_login").val(),password:$("#r_password").val(),input: $("#registr").val()}),
                dataType: "html",
                beforeSend: function(){

                },
                success: function (data){

                    if(data=="Занято"){
                        $("#r_information").text("Такой логин уже занят");
                    }else {

                        $("#r_information").text("Вы успешно зарегистрировались");
                    }
                }
            })
        })
    })
</script>
<!--Подключение бустрапа-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>