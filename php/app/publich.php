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
        mysqli_select_db ($db, 'base_name');
        $db->set_charset("utf8");
    
        $id = $_POST['id'];
        $review = $_POST['review'];
        $updateID = "UPDATE `reviews` SET publich = 1 WHERE id = $id";
        $updateREV = "UPDATE `reviews` SET review = '$review' WHERE id = $id";
    
        $db->query($updateID);
        $db->query($updateREV);
        
        header('Location: http://weddingstylist.xyz/php/app/action.php');
//        header('Location: http://localhost/php/app/action.php');
        exit;
    ?>
</head>
<body>
    
</body>
</html>