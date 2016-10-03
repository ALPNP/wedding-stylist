<?php
session_start();

if (!isset($_SESSION['auth']))
{
    $status = "Доступ запрещен";
    header('Refresh: 5; URL=http://weddingstylist.xyz/');
    echo "Вы не являетесь администратором сайта, <br> Вы будете перенаправлены на главную страницу через 5 секунд";
    exit();
}

if (!isset($_POST['cat']))
{
    header('Location: http://weddingstylist.xyz/');
    exit;
}

if (!isset($_POST['podcat']))
{
    header('Location: http://weddingstylist.xyz/');
    exit;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
        $db = mysqli_connect ('server_name', 'user_name', 'password');
        mysqli_select_db ($db, 'u857097171_main');
        $db->set_charset("utf8");
    
        $id = time();
        $numid = $_POST['cat'];
        $podcat = $_POST['podcat'];
        
        $insertPodcat = "INSERT INTO `category` ( `id`, `cat`, `podcat`)
                    VALUES ('".$id."', '".$numid."', '".$podcat."')";
    
        $db->query($insertPodcat);
        
//    echo $id;
//    echo $cat;
//    echo $podcat;
        
        header('Location: http://weddingstylist.xyz/php/app/redact.php');
//        header('Location: http://localhost/php/app/redact.php');
        exit;
    ?>
</head>
<body>
    
</body>
</html>