<?php
   if (@$_POST['button'])
    {   
       // Включить перед продакшеном
        if (!preg_match("/weddingstylist\.xyz/", $_SERVER['HTTP_REFERER'])) exit();
        
        $log = $_POST['name'];
        $pass = md5 ("".$_POST['pass']);
        
        if (($log === $row[0]) and ($pass === $row[1]))
        {
            $_SESSION['auth'] = $log;
            echo
            '<script type="text/javascript">
                document.location.href= "php/app/action.php";
            </script>';
        }
        else
        {
            $result = "Указан неверный логин или пароль";
        }
    }
?>