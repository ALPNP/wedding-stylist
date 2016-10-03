<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Статьи</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- My styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!--style for states-->
    <link rel="stylesheet" href="css/statestyle.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.1.11.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <!--Axel.js-->
    <script src="php/public/js/axel.js"></script>
    <!--ReadMORE.js-->
    <script src="js/readmore.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Yandex.Metrika counter -->

    <!-- /Yandex.Metrika counter -->
</head>

<body>
    <!--Вставка меню-->
    <?php include( "php/modules/menu.php");?>
    <!--Вставка меню-->
    <div class="wrapper undermenu">
        <div class="container">
            <div class="row">
                <div class="col-md-4 img-for-text hidden-xs hidden-sm">
                    <img src="img/circles/wed_hair2.jpg" alt="" class="img-circle img-responsive center-block wrap blend" width="300px">
                </div>
                <div class="col-md-4 img-for-text">
                    <img src="img/circles/brush4.jpg" alt="" class="img-circle img-responsive center-block wrap" width="300px">
                    <h2 class="text-circle"><span>Статьи</span></h2>
                </div>
                <div class="col-md-4 img-for-text hidden-xs hidden-sm">
                    <img src="img/circles/wed_hair3.jpg" alt="" class="img-circle img-responsive center-block wrap blend" width="300px">
                </div>
            </div>
        </div>
        
    </div>
    <div class="container-fluid">
    <div class="row">
            <div id="stmenu" class="col-xs-2">
                <!--Меню навигации для статей-->
                <?php include("php/modules/statemenu.php");?>
            </div>
            <!--Меню навигации для статей END-->
            <div id="stlist" class="col-xs-10">
                <!--С данным элементом работает JavaScript, вставлять какие либо элементы в данный тег нежелательно-->
            </div>
            <!--Ajax для работы с данными статей-->
            <script src="js/states/ajaxgetst.js"></script>
    </div>
    </div>
    <!--Footer begin-->
    <div id="footer">
        <div class="container">
            <div class="row">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="col-md-4">
                    <center class="text-area-footer">
                        <i class="fa fa-phone-square fa-5x" aria-hidden="true"></i>
                        <br>
                        <h4>Запись по телефону: <br><br> +7(926)542-11-31</h4>
                    </center>
                </div>
                <div class="col-md-4">
                    <center class="text-area-footer">
                        <i class="fa fa-info-circle fa-5x" aria-hidden="true"></i>
                        <br>
                        <h4>Просьба уточнять дату и время <br><br> заранее, ведётся запись. </h4>
                    </center>
                </div>
                <div class="col-md-4">
                    <center class="text-area-footer">
                        <i class="fa fa-paint-brush fa-5x" aria-hidden="true"></i>
                        <br>
                        <h4>В работе используется  <br><br>профессиональная косметика.</h4>
                    </center>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="container wrapper">
                <div class="col-md-12">
                    <!-- Yandex.Metrika informer -->
           
                    <!-- /Yandex.Metrika informer -->
                </div>
            </div>
            <div class="container wrapper">
                <br>
                <form name="form1" method="post" action="pass.php">
                        <input class="btn btn-tiffany" type="submit" name="Submit" value="Вход" id="Submit">
                </form>
            </div>
            <div class="row">
                <p>
                    <center>
                        <p class="footertext">Copyright &#169 2016 Все права защищены</p>
                    </center>
                </p>
            </div>
        </div>
    </div>
    <!--Footer end-->
    <!--    Anchor-->
    <script src="js/anchorup.js"></script>
</body>

</html>