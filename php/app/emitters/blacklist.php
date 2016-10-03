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
    header('Refresh: 5; URL=http://weddingstylist.xyz/');
    echo "ОЙ, <br> Что-то сервер не отвечает, попробуйте позже";
    exit();
}

if (!isset($_POST['header']))
{
    header('Refresh: 5; URL=http://weddingstylist.xyz/');
    echo "ОЙ, <br> Что-то сервер не отвечает, попробуйте позже";
    exit();
}

if (!isset($_POST['statetext']))
{
    header('Refresh: 5; URL=http://weddingstylist.xyz/');
    echo "ОЙ, <br> Что-то сервер не отвечает, попробуйте позже";
    exit();
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
        $blackList = 0;
        $cat = $_POST['cat'];
        
         // Проверка на наличие подкатегории
        if (isset($_POST['podcat']))
        {
            $podcat = $_POST['podcat'];
        }
        else 
        {
            $podcat = 'none';
        }
    
    // ----------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------
    // Ненужный код, печальк...
    /*
        $header = $_POST['header'];
        $stateText = $_POST['statetext'];
        // Пилим фотки
        // Жестокий shitcode  
        $images = [];
        $uploadDir = "../../../img/states/";
    
        for ($i = 1; $i<count($_FILES); $i++)
        {
            $pos = 'foto'.$i;
            $uploadFileName = $_FILES[$pos]['name'];
            $fileSize = $_FILES[$pos]['size'];
            // Взяли и получили тип файла, после точки
            $fileType = array_pop(explode('.', $uploadFileName));
            // А потом немножк психонули и получили с другой стороны
            // Только вот незадача, файлы с 3 точками никак не проверяются
            $fileName = array_shift(explode('.', $uploadFileName));
            $newFileName = time().'_head_'.$fileName.'.'.$fileType;
            $upFileRout = $uploadDir.$newFileName;
            $resFileName = iconv('utf-8', 'windows-1251', $upFileRout);
            
            if(is_uploaded_file($_FILES[$pos]["tmp_name"]))
            {
                move_uploaded_file($_FILES[$pos]["tmp_name"],
                $resFileName);
            }
            
            $imageName = array_pop(explode('/', $resFileName));
            array_push($images, $imageName);
        }
    
        $imageName = array_pop(explode('/', $resFileName));
        
        $imagesStr = implode(',', $images);
    
        $imagesUtf8 = iconv('windows-1251', 'utf-8', $imagesStr);
        
        $blackPublic = "INSERT INTO `states` ( `id`, `cat`, `podcat`, `header`, `images`, `statetext`, `status`)
                    VALUES ('".$id."', '".$cat."', '".$podcat."', '".$header."', '".$imagesUtf8."', '".$stateText."', '".$blackList."')";
    
        */
    
        $errorCount = [];
    
        if (empty($_POST['header']))
        {
            $header = "";
            array_push($errorCount, "false");
            echo "<p>Вы не указали название статьи, статья была заблокирована.</p>";
//            echo "<input class='buttonSend' onclick='window.history.back();' type='button' value='Вернуться обратно'/>";
        }
        else
        {
            $header = $_POST['header'];
        }
    
        if (empty($_POST['statetext']))
        {
            $stateText = "";
            array_push($errorCount, "false");
            echo "<p>Вы не заполнили текст статьи, статья была заблокирована.</p>";
//            echo "<input class='buttonSend' onclick='window.history.back();' type='button' value='Вернуться обратно'/>";
        }
        else
        {
            $stateText = $_POST['statetext'];
        }

        // Пилим фотки
        // Жестокий shitcode
        $uploadDir = "../../../img/states/";
    
        $pos = 'foto1';
        
        if (!$_FILES[$pos]['name'])
        {
            $imagesUtf8 = "";
            array_push($errorCount, "false");
            echo "<p>Вы не прикрепили фон статьи, статья была заблокирована.</p>";
//            echo "<input class='buttonSend' onclick='window.history.back();' type='button' value='Вернуться обратно'/>";
        }
        else
        {
            $uploadFileName = $_FILES[$pos]['name'];
            echo $uploadFileName;
            // Взяли и получили тип файла, после точки
            $fileType = array_pop(explode('.', $uploadFileName));
            // А потом немножк психонули и получили с другой стороны
            // Только вот незадача, файлы с 3 точками никак не проверяются
            $fileName = array_shift(explode('.', $uploadFileName));
            $newFileName = $id.'_'.$fileName.'.'.$fileType;
            $upFileRout = $uploadDir.$newFileName;
            $resFileName = iconv('utf-8', 'windows-1251', $newFileName);

            if(is_uploaded_file($_FILES[$pos]["tmp_name"]))
            {
                move_uploaded_file($_FILES[$pos]["tmp_name"],
                $upFileRout);
            }
            // Очень нужные строковые операции
            $imageName = array_pop(explode('/', $resFileName));         
            $image = $resFileName;
            $imageName = array_pop(explode('/', $resFileName));
            $imagesStr = $image;
            $imagesUtf8 = iconv('windows-1251', 'utf-8', $imagesStr);
//            echo $imagesUtf8;
        }
    
        if (count($errorCount) > 0)
        {
            $stateAddFalse = 3;
            $blackPublic = "INSERT INTO `states` ( `id`, `cat`, `podcat`, `header`, `images`, `statetext`, `status`)
                    VALUES ('".$id."', '".$cat."', '".$podcat."', '".$header."', '".$imagesUtf8."', '".$stateText."', '".$stateAddFalse."')";
        }
        else
        {
            $blackPublic = "INSERT INTO `states` ( `id`, `cat`, `podcat`, `header`, `images`, `statetext`, `status`)
                    VALUES ('".$id."', '".$cat."', '".$podcat."', '".$header."', '".$imagesUtf8."', '".$stateText."', '".$blackList."')";
        }
        
        
        $db->query($blackPublic);

if (count($errorCount) > 0)
    {
        echo "<input class='buttonSend' onclick='window.history.back();' type='button' value='Вернуться обратно'/>";
        header('Refresh: 5; URL=http://localhost/php/app/action.php');
    }
    else
    {
        echo "<p>Статья была успешно сохранена в черновиках.</p>";
        echo "<input class='buttonSend' onclick='window.history.back();' type='button' value='Вернуться обратно'/>";
        header('Refresh: 5; URL=http://localhost/php/app/action.php');
    }
    exit();
    ?>
</head>
<body>
    
</body>
</html>