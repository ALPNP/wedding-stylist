<?php
$db = mysqli_connect ('server_name', 'user_name', 'password');
mysqli_select_db ($db, 'base_naem');
$db->set_charset("utf8");

if (!isset($_POST['name']))
{
    header('Refresh: 0; URL=http://weddingstylist.xyz/');
    exit;
}

$id = time();
$name = htmlspecialchars($_POST['name']);
$review = htmlspecialchars($_POST['review']);
$img = "php/public/img/review/".$_FILES["foto"]["name"];
$publich = 0;

//echo $img;

$insert = "INSERT INTO `reviews` (`id`, `name`, `review`, `img`, `publich`) 
           VALUES ('".$id."','".$name."','".$review."','".$img."','".$publich."')";

$query = mysqli_query($db, $insert);

if($_FILES["foto"]["size"] > 1024*6*1024)
{
    echo ("Размер файла превышает 6 мегабайт");
    header('Refresh: 3; URL=http://weddingstylist.xyz/reviews.php');
    exit;
}
// Проверяем загружен ли файл
if(is_uploaded_file($_FILES["foto"]["tmp_name"]))
{
    // Если файл загружен успешно, перемещаем его
    // из временной директории в конечную
    move_uploaded_file($_FILES["foto"]["tmp_name"], "php/public/img/review/".$_FILES["foto"]["name"]);
}   
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Отзывы</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- My styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.1.11.3.js"></script>
    <!--    Fixed Menu script-->
    <script src="js/fixedmenu.js"></script>
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
</head>

<body>
    <!--Вставка меню-->
    <?php include( "php/modules/menu.php"); ?>
    <!--Вставка меню-->
    <?php
    
    $htmlRev = "<div class='container-fluid'>
       <div class='col-md-12 wrapper'>
           <hr>
           <h3><strong>Здравствуйте,  ".$name." ?></strong></h3>
           <h3><strong><b>Ваш отзыв<b>:".$review."<br>
           Будет опубликован после проверки, спасибо за уделённое время.</strong></h3>
           <h3><strong>Через 10 секунд, Вы будете перенаправлены на главную страницу.</strong></h3>
           <hr>
       </div>
    </div>";
    
        header('Refresh: 10; URL=http://weddingstylist.xyz/');
        echo $htmlRev;
        exit;
    ?>
    
</body>

</html>