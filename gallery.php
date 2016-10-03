<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Галерея свадебных причесок" />
    <meta name="keywords" content="Мои работы, картинки, волосы, макияж" />
<!--    <meta name="robots" content="index,follow" />-->

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- My styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!--Animate-->
    <link rel="stylesheet" href="css/animate.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.1.11.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--Animate-->
    <script src="js/animateCSS.js"></script>
    <!--Wow.js-->
    <script src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script>

    <!-- Yandex.Metrika counter -->

    <!-- /Yandex.Metrika counter -->

    <!-- FancyBox Plugin -->
    <!-- Add fancyBox main JS and CSS files -->
    <link rel="stylesheet" type="text/css" href="js/fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script type="text/javascript" src="js/fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="js/fancybox.js"></script>
    <!-- FancyBox Plugin  END-->

    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.js"></script>
    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>
</head>

<body>
    <!--Вставка меню-->
    <?php include( "php/modules/menu.php"); ?>
    <!--Вставка меню-->
    <div class="wrapper undermenu">
        <div class="container">
            <div class="row">
                <div class="col-md-12 img-for-text">
                    <img src="img/circles/brush1.jpg" alt="" class="img-circle img-responsive center-block wrap" width="300px">
                    <h2 class="text-circle"><span>Галерея</span></h2>
                </div>
            </div>
        </div>
    </div>
    <!--Fancy box-->
    <div class="container wrapper">
        <h3>В данном разделе Вы можете посмотреть мои работы:</h3>
        <div class="grid list-group gallery">
            <div class="grid-sizer"></div>
            
                                    
            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/nine.jpeg" class="thumbnail fancybox">
                    <img src="img/gallery/nine.jpeg" />
                </a>
            </div>

            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/six.jpg">
                    <img src="img/gallery/six.jpg" />
                </a>
            </div>
            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/eight.jpg">
                    <img src="img/gallery/eight.jpg" />
                </a>
            </div>
            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/seven.jpg">
                    <img src="img/gallery/seven.jpg" />
                </a>
            </div>
            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/five.jpg">
                    <img src="img/gallery/five.jpg" />
                </a>
            </div>
            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/second.jpg">
                    <img src="img/gallery/second.jpg" />
                </a>
            </div>
            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/four.jpg">
                    <img src="img/gallery/four.jpg" />
                </a>
            </div>
            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/first.jpg">
                    <img src="img/gallery/first.jpg" />
                </a>
            </div>
            <div class="grid-item">
                <a class="thumbnail fancybox" data-fancybox-group="gallery" href="img/gallery/three.jpg">
                    <img src="img/gallery/three.jpg" />
                </a>
            </div>
        </div>
    </div>
    <!--Fancy box END-->
    <div class="container wowjs-slideInUp">
        <div class="col-md-12" style="text-align: center">

            <iframe src='/inwidget/index.php' scrolling='no' frameborder='no' style='border:none;width:260px;height:330px;overflow:hidden;'></iframe>
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
    <!--Masonry Script-->
    <script src='js/masonry.js'></script>
</body>

</html>