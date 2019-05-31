<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Авторизация
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div id="login">
                        <form method="post" action="../login.php" style="float: left; margin-right: 15px; border-right: solid 1px grey; padding-right:15px ">
                            <h3>Авторизация</h3>
                            <input type="text" placeholder="Логин" name="login"><br><br>
                            <input type="text" placeholder="Пароль" name="password"><br><br>
                            <br><input name="input" type="submit" value="Войти"><br>

                        </form>

                    </div>
                    <div id="registration">
                        <form method="post" action="../login.php" style="">
                            <h3>Регистрация</h3>
                            <input type="text" placeholder="Логин" name="login"><br><br>
                            <input type="text" placeholder="Пароль" name="password"><br><br>
                            <br><input name="input" type="submit" value="Регистрация"><br>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


