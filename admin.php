
<?php
if ($_COOKIE['login']=='') {
    header("Location:../wellcome.php");
}
include 'includes/header.php'?>
<main class=" p-2 row">
<div class="container bg-white">
    <h2>Администрирование</h2>
    <nav class="m-3">
        <ul class="nav float-left flex-column">
            <li class="m-2">
                <button class="btn btn-primary" value="article">Создать статью</button>
            </li>
            <li class="m-2">
                <button class="btn btn-primary" value="news" >Создать новость</button>
            </li>
            <li class="m-2">
                <button class="btn btn-primary" value="artist">Создать артиста</button>
            </li>
            <li class="m-2">
                <button class="btn btn-primary" value="tab">Создать табы</button>
            </li>
        </ul>
    </nav>

    <div class="text-center p-2 window" >


    </div>


</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script>

        $(document).ready(function () {
            $(".btn").bind("click",function () {
                $.ajax({
                    url: "scripts/adminWindow.php",
                    type: "POST",
                    data: ({type: $(this).val()}),
                    dataType: "html",
                    success: function (data){
                        $(".window").html(data);

                    }
                })
            })
        })

    </script>



<!--Подключение бустрапа-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>


</main>
<footer>

</footer>
</body>
</html>