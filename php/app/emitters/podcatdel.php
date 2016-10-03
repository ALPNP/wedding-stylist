<?php
session_start();

if (!isset($_SESSION['auth']))
{
    $status = "Доступ запрещен";
    header('Refresh: 5; URL=http://weddingstylist.xyz/');
    echo "Вы не являетесь администратором сайта, <br> Вы будете перенаправлены на главную страницу через 5 секунд";
    exit();
}

if (!isset($_POST['id']))
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
        
        $id = $_POST['id'];
        
        $deletePodcat = "DELETE from `category` where id = $id";
    
        $db->query($deletePodcat);
        
        header('Location: http://weddingstylist.xyz/php/app/redact.php');
//        header('Location: http://localhost/php/app/redact.php');
        exit;
    ?>
</head>
<body>
    
</body>
</html>

?>