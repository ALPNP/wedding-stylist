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

$db = mysqli_connect ('server_name', 'user_name', 'password');
mysqli_select_db ($db, 'u857097171_main');
$db->set_charset("utf8");

$req = $_POST["cat"];

$reqPost = array();

$selectPodcat = "SELECT * FROM `category` WHERE cat = '".$req."'";
// Выборка подкатегорий
if ($res = $db->query($selectPodcat))
{
    while ($row = $res->fetch_row())
    {
        array_push($reqPost, $row[2]);
    }
}

$json = json_encode($reqPost);

echo $json;
?>