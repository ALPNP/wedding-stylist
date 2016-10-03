<!--Меню сайта-->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                <span class="sr-only">Открыть меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="responsive-menu">
            <ul class="nav navbar-nav">
                <li>
                   <a href="#"><strong>
                    <?php
                    $sessionName = $_SESSION['auth'];
                    $userName = ucfirst($sessionName);
                    echo "Добро пожаловать ".$userName;
                    ?></strong>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/beauty__stylist_/" target="_blank"><img class="img-responsive" src="../../img/insta.png" alt="Мои работы в Instagram" width="20px"></a>
                </li>
                <li>
                    <a href="action.php"><strong><i class="fa fa-comments-o" aria-hidden="true"></i> Отзывы и блог</strong></a>
                </li>
                <li>
                    <a href="redact.php"><strong><i class="fa fa-cubes" aria-hidden="true"></i> Редактор контента</strong></a>
                </li>
            </ul>
            <form method="GET" action="../app/action.php" class="navbar-form navbar-right">
               <input type="text" name="exit" hidden value="1">
                <button type="submit" class="btn btn-danger btn-exit">
                    <i class="fa fa-sign-in"> Выход </i>
                </button>
            </form>
        </div>
    </div>
</div>
<!--Меню сайта-->