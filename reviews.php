<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Отзывы клиентов</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Отзывы клиентов о свадебных прическах" />
    <meta name="keywords" content="отзывы, невест, москва, люберцы" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- My styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">

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

    <!-- Yandex.Metrika counter -->

    <!-- /Yandex.Metrika counter -->
<!--      Recaptcha  -->
<!--    <script src='https://www.google.com/recaptcha/api.js'></script>-->
</head>

<body>
    <!--Вставка меню-->
    <?php include( "php/modules/menu.php");?>
    <!--Вставка меню-->
    <div class="wrapper undermenu">
        <div class="container">
            <div class="row">
                <div class="col-md-4 img-for-text hidden-xs hidden-sm">
                    <img src="img/circles/wed_hair4.jpg" alt="" class="img-circle img-responsive center-block wrap blend" width="300px">
                </div>
                <div class="col-md-4 img-for-text">
                    <img src="img/circles/brush3.jpg" alt="" class="img-circle img-responsive center-block wrap" width="300px">
                    <h2 class="text-circle"><span>Отзывы</span></h2>
                </div>
                <div class="col-md-4 img-for-text hidden-xs hidden-sm">
                    <img src="img/circles/wed_hair5.jpg" alt="" class="img-circle img-responsive center-block wrap blend" width="300px">
                </div>
            </div>
        </div>
    </div>
    <div class="container content">
        <script src="js/validator.js"></script>
        <div class="col-md-4 form-group wrap">
            <div class="container-fluid wrapper">
                <label for="form" class="review">Оставить отзыв:</label>
            </div>
            <form name="form" role="form" method="post" enctype="multipart/form-data" action="write.php">
                <input type="hidden" name="MAX_FILE_SIZE" value="9000000" />

                <label for="name">Имя*:</label>
                <input class="form-control" type="text" name="name" placeholder="Введите Ваше имя">

                <label for="review">Отзыв*:</label>
                <textarea class="form-control" type="text" name="review" placeholder="Оставьте отзыв"></textarea>

                <label for="foto">Прикрепить фото:</label>
                <input type="file" name="foto" accept="image/*">

                <div class="review">
                    <p class="text text-danger wrapper"><strong>* - Поля, обязательные для заполнения.</strong></p>
                </div>
                <div class="wrapper review">

                    
                    <input class="btn btn-pink" type="submit" value="Опубликовать" style="margin-top: -15px;" onclick="validate.handler(this.form);return false;">
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="wrap">
                <?php $db=mysqli_connect ('server_name', 'user_name', 'password'); 
                mysqli_select_db ($db, 'base_name'); 
                $db->set_charset("utf8"); 
                $select = "SELECT * FROM `reviews` WHERE publich = 1 ORDER BY id DESC";
                
                
                if ($result = $db->query($select)) 
                { 
                    while ($row = $result->fetch_row()) 
                    { 
                        $time = "<p class='text'><strong>".date("d.m.Y", $row[0])."</strong></p>";
                        $name = "<p class='text'><strong>".$row[1]."</strong></p>";
                        $review = "<p class='text'>".$row[2]."</p>";
                        
//                        $imgURL = "php/public/img/invisible.png"; 
//                        
//                        if ($row[3] !== "php/public/img/review/") 
//                        {
//                            $imgURL = $row[3]; 
//                        } 
//                        
//                        $img = "<img class='img img-circle wrap author-img' style='width: 50px; height: 50px; padding: 5px;' src=".$imgURL." alt=''>"; 
                        $br = "<br>";
                        
                        $hr = "<hr style='margin-top: 5px; margin-bottom: 5px;'>";
                        $div = "<div class='col-xs-12 wrap' style='margin-bottom: 15px; padding: 10px 10px 5px 10px;'>
                
                        <div class='col-md-6 name-rev'>".$name."</div>
                
                        <div class='col-md-6 time-rev'>".$time."</div>
                        
                        <div class='col-md-12'>".$hr.$review.$hr."</div>
                            
                        </div>"; 
                        
                        echo $div; 
                    }
                } 
                ?>
            </div>
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
</body>

</html>