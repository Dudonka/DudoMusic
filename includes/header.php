
<!DOCTYPE html>

<head>

    <title>DudoMusic</title>
    <link rel="shortcut icon" href="img/D.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background-image: url(../img/back3.jpg);
            background-size: cover;
            background-attachment: fixed;}
    </style>
</head>
<header class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="#"><h1 class="float-left">Dudo</h1><h2 class="float-left " style="margin-top: 3px;border-bottom: 2px solid blue">Music</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../allarticlesview.php?type=article">Статьи <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../allarticlesview.php?type=news">Новости<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../allarticlesview.php?type=tab">Табы<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" style="margin-left: 4rem">
                    <form class="form-inline my-2 my-lg-0" action="../search.php" method="get">
                        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Поиск</button>
                    </form>
                </li>
            </ul>

        <!-- Button trigger modal -->

        <?php

        if (isset($_COOKIE['login'])==false){
            include 'profile.php';}
        else{
           ?>
            <li class="nav active">
                <a class="" href="../music.php" style="margin-right: 1rem"><span style="margin-left: 2rem"> Моя музыка</span>
                </a></li>
            <div class="nav-item dropleft" style="margin-right: 1rem">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_COOKIE['login']?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 1rem">
                    <?php if ($_COOKIE['type']=="admin"){?>
                        <a href="../admin.php"><span >Администрирование</span></a>
                    <?php }?>
                    <a href="../scripts/exit.php" ><span>Выход</span></a>
                </div>
            </div> <?php
        }
        ?>
        </div>
    </nav>
</header>
<body>