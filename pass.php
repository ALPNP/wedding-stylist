<?php
session_start();
$db = mysqli_connect ('server_name', 'user_name', 'password');
mysqli_select_db ($db, 'base_name');

$select = @mysqli_query ($db, "SELECT log, pass, ip, ip_del_time FROM users");
if (!$select) exit ('#110');
$row = @mysqli_fetch_row ($select);
if (!$row) exit ('#111');

$result = null;
$block = null;
$disabledButton = null;

//if (ini_get('register_globals')) {
//    exit('Off Reg_globals');
//}

if (!isset($_SESSION['accessCount']))
{
    $_SESSION['accessCount'] = 0;
    $_SESSION['accessCountTime'] = time ();
    $_SESSION['accessCountIp'] = $_SERVER['REMOTE_ADDR'];
}

$_SESSION['accessCount']++;

if ((time() - $_SESSION['accessCountTime']) > 600 ) unset ($_SESSION['accessCount']);

if (!empty ($row[2]))
{
    if ((time() - $row[3]) < 600 ) 
    {
        $block = "Вы заблокированы, попробуйте через 10 минут";
    }
    else
    {
        $select = @mysqli_query ($db, "UPDATE users SET ip='', ip_del_time = '' WHERE log = 'user'");
        if (!$select) exit ("#112");
        unset ($_SESSION['accessCount']);
    }
}
if (isset($_SESSION['accessCount']))
{
    if ($_SESSION['accessCount'] > 5)
    {
        $select = @mysqli_query ($db, "UPDATE users SET ip='$_SESSION[bruteForce_ip]', 
        ip_del_time = '$_SESSION[bruteForce_T]' WHERE log ='user'");
        $block = "Вы заблокированы, попробуйте через 10 минут";
        $disabledButton = "disabled";
        $result = null;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Вход для администратора</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <!--Auth-->
    <link rel="stylesheet" href="css/auth/animate.css">
    <link rel="stylesheet" href="css/auth/styleauth.css">

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
    <?php include("php/modules/menu.php")?>
        <div id="container">
            <form method="post">
                <label for="name">Логин:</label>
                <input type="name" name="name">
                <label for="pass">Пароль:</label>
                <input type="password" name="pass">
                <div id="lower">
                    <input class="btn btn-tiffany" type="submit" value="Войти" name="button" <?php echo $disabledButton ?>/>
                        <?php require("php/modules/form.php"); ?>
                     <p style="text-align: center; margin-top: 40px;" class="text text-danger">
                       <strong>
                        <?php 
                            echo $result;
                            echo "<br>";
                            echo $block;
                        ?>
                        </strong>
                    </p>
                </div>
            </form>
        </div>
</body>
</html>