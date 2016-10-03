<?php
session_start();
if (!isset($_SESSION['auth']))
{
    $status = "Доступ запрещен";
    header('Refresh: 5; URL=http://weddingstylist.xyz/');
    echo "Вы не являетесь администратором сайта, <br> Вы будете перенаправлены на главную страницу через 5 секунд";
    exit();
}

if (isset($_GET['exit']) == 1)
{
    echo "До свидания ".$_SESSION['auth']. ", приходите к нам еще.";
    unset ($_SESSION['auth']);
    session_destroy();
    header('Refresh: 5; URL=http://weddingstylist.xyz/');
    exit();
}

$db = mysqli_connect ('server_name', 'user_name', 'password');
mysqli_select_db ($db, 'base_name');
$db->set_charset("utf8");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора></title>
    
    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <!-- My styles -->
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../public/js/jquery.1.11.3.js"></script>
    <!--    Fixed Menu script-->
    <!--    <script src="../../js/fixedmenu.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../public/js/bootstrap.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="../public/js/axel.js"></script>
    
    <script type="text/javascript" src="../public/js/ckeditor/ckeditor.js"></script>
    
</head>
<body>
    <?php require('../modules/adminmenu.php');?>
    
    
        
    
    <div class="container">
       <div class="row">
          <div class="col-xs-12 col wrapper"> 
            <h3><i class="fa fa-comments-o" aria-hidden="true"></i> Отзывы и блог</h3>
        </div>
           
           
<div class="col-md-6 col">
<h4 class="wrapper">Отзывы</h4>
<ul class="nav nav-tabs">
 
            <?php
            
            $selectModerate = "SELECT * FROM `reviews` WHERE publich = 0";
            $selectPosted = "SELECT * FROM `reviews` WHERE publich = 1";
            $selectTrash = "SELECT * FROM `reviews` WHERE publich = 2";
                       
            $countModerate = 0;
            $countPosted = 0;
            $countTrash = 0;
            
            if ($result = $db->query($selectModerate)) 
            {
                while ($row = $result->fetch_row()) 
                {
                    $countModerate++;
                }
            }
                       
            if ($result = $db->query($selectPosted)) 
            {
                while ($row = $result->fetch_row()) 
                {
                    $countPosted++;
                }
            }
                       
            if ($result = $db->query($selectTrash)) 
            {
                while ($row = $result->fetch_row()) 
                {
                    $countTrash++;
                }
            }
            ?>
 
  <li><a data-toggle="tab" href="#panel1"><i class="fa fa-file" aria-hidden="true"></i> На модерации - <?php echo $countModerate; ?></a></li>
  <li><a data-toggle="tab" href="#panel2"><i class="fa fa-file-text" aria-hidden="true"></i> Опубликовано - <?php echo $countPosted; ?></a></li>
  <li><a data-toggle="tab" href="#panel3"><i class="fa fa-trash" aria-hidden="true"></i> Корзина - <?php echo $countTrash; ?></a></li>  
</ul>
 
<div class="tab-content">
  <div id="panel1" class="tab-pane fade col">
   
    <h4>Неопубликованные отзывы</h4>
    <hr>
                <?php
                
                if ($res = $db->query($selectModerate))
                {
                    while ($row = $res->fetch_row())
                    {
                        $time = "<p><strong>Дата:</strong> ".date("d.m.Y H:i", $row[0])."</p>";
                        $name = "<p><strong>Имя:</strong> ".$row[1]."</p>";
                        $checkboxForm = "<form name='form' role='form' method='POST' action='publich.php'>
                        <label for='review'>Отзыв:</label>
                        <br>
                        <textarea rows=4 class='form-control' type='text' name='review'>".$row[2]."</textarea>
                        <input type='text' name='id' hidden value=".$row[0].">
                        <hr>
                        <lavel for='foto'><strong>Фото:</strong></label>
                        <div class='wrapper col-md-12'><img class='img' style='width: 137px; height: 137px;' src=../../".$row[3]." alt=''></div>
                        <br>
                        <input style='margin-top:15px;' class='btn btn-tiffany' type='submit' value='Опубликовать'>
                        </form>";
                        $br = "<br>";
                        $hr = "<hr>";
                        
                        $div = "<div style='border: 2px solid violet; padding: 5px 5px 5px 5px;'>" .$hr.$name.$time.$hr.$checkboxForm. "</div>";
                        
                        echo $div;
                    }
                }
                ?>
            </div>
  
  <div id="panel2" class="tab-pane fade col">
    <h4>Опубликованные отзывы</h4>
    <hr>
       
       <?php
                
                if ($res = $db->query($selectPosted))
                {
                    while ($row = $res->fetch_row())
                    {
                        $time = "<p><strong>Дата:</strong> ".date("d.m.Y H:i", $row[0])."</p>";
                        $name = "<p><strong>Имя:</strong> ".$row[1]."</p>";
                        $checkboxForm = "<form name='form' role='form' method='POST' action='unpublich.php'>
                        <label for='review'>Отзыв:</label>
                        <br>
                        
                        <p>".$row[2]."</p>
                        
                        <input type='text' name='id' hidden value=".$row[0].">
                        <hr>
                        <lavel for='foto'><strong>Фото:</strong></label>
                        <div class='wrapper col-md-12'><img class='img' style='width: 137px; height: 137px;' src=../../".$row[3]." alt=''></div>
                        <br>
                        <input style='margin-top:15px;' class='btn btn-danger' type='submit' value='Поместить в корзину'>
                        </form>";
                        $br = "<br>";
                        $hr = "<hr>";
                        
                        $div = "<div style='border: 2px solid violet; padding: 5px 5px 5px 5px;'>" .$hr.$name.$time.$hr.$checkboxForm. "</div>";
                        
                        echo $div;
                    }
                }
                ?>
        
  </div>
  <div id="panel3" class="tab-pane fade col">
      <h4>Отзывы, снятые с публикации</h4>
    <hr>
    
    <?php
                
                if ($res = $db->query($selectTrash))
                {
                    while ($row = $res->fetch_row())
                    {
                        $time = "<p><strong>Дата:</strong> ".date("d.m.Y H:i", $row[0])."</p>";
                        $name = "<p><strong>Имя:</strong> ".$row[1]."</p>";
                        $checkboxForm = "<form name='form' role='form' method='POST' action='publich.php'>
                        <label for='review'>Отзыв:</label>
                        <br>
                        <textarea rows=4 class='form-control' type='text' name='review'>".$row[2]."</textarea>
                        <input type='text' name='id' hidden value=".$row[0].">
                        <hr>
                        <lavel for='foto'><strong>Фото:</strong></label>
                        <div class='wrapper col-md-12'><img class='img' style='width: 137px; height: 137px;' src=../../".$row[3]." alt=''></div>
                        <br>
                        <input style='margin-top:15px;' class='btn btn-tiffany' type='submit' value='Вернуть в публицакию'>
                        </form>";
                        $br = "<br>";
                        $hr = "<hr>";
                        
                        $div = "<div style='border: 2px solid violet; padding: 5px 5px 5px 5px;'>" .$hr.$name.$time.$hr.$checkboxForm. "</div>";
                        
                        echo $div;
                    }
                }
                ?>
    
  </div>
</div>
            
        </div>
        <div class="col-md-6 col">
           <h4 class="wrapper">Блог</h4>
           
           
           
            <div class="col-md-12">
                             
<ul class="nav nav-tabs"> 
  <li class="active"><a data-toggle="tab" href="#blog1"><i class="fa fa-font" aria-hidden="true"></i> Написать в блог</a></li>
  <li><a data-toggle="tab" href="#blog2"><i class="fa fa-file-text" aria-hidden="true"></i> В разработке </a></li>
  <li><a data-toggle="tab" href="#blog3"><i class="fa fa-trash" aria-hidden="true"></i> В разработке</a></li>  
</ul>
 
<div class="tab-content">
  <div id="blog1" class="tab-pane fade active in col">
    <h4>Написать статью в блог</h4>
    <hr>
    
        <div style='border: 2px solid violet; padding: 5px 5px 5px 5px;'>
           
            <!-- Скрипт на выборку подкатегорий через AJAX-->
            <script src="../public/js/ajaxlisteners.js"></script>
                
            <form id='addstate' name="form" role="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="9000000" />
        
                    <div class="form-group">
                       <label class="control-label" for="cat">Выбор категории:</label>
                        <select id="podcatsort"  class="form-control" name="cat">
                            <option value="1">Образ невесты</option>
                            <option value="2">Стили невест</option>
                            <option value="3">Макияж</option>
                            <option value="4">Прически</option>
                            <option value="5">Подготовка к макияжу</option>
                            <option value="6">Подготовка к прическе</option>
                            <option value="7">Репетиция</option>
                            <option value="8">Последние тенденции</option>
                        </select>
                    
                    </div>
                    
                    <div class="form-group">
                       <label class="control-label" for="podcat">Выбор подкатегории:</label>
                        <select id="podcatrender" class="form-control" name="podcat">
                        </select>
                    </div>
                
                    <div class="form-group">
                    <label class="control-label" for="header">Заголовок статьи:</label>
                    <!-- Form Control -->
                        <input class="form-control" type="text" name="header" placeholder="Заголовок статьи" type="text">
                    </div>
                                    
                    <div class="form-group">
                    <!-- Form Control -->
                    <label class="control-label" for="foto1">Прикрепить изображение для фона статьи:</label>
                    <input class="form-control" type="file" name="foto1" accept="image/*">
                    </div>
                
                    <div class="form-group">
                    <label class="control-label" for="statetext">Текст статьи:</label>
<!--                     Form Control -->
                        <textarea rows="30" class="form-control" type="text" name="statetext" placeholder="Текст статьи"></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'statetext', {
                                extraPlugins: 'imageuploader',
//                                filebrowserBrowseUrl : '/browser/browse.php',
                                filebrowserUploadUrl : '/php/modules/upload.php'        
                            });
                        </script>
                    </div>
                    
                    <input class="btn btn-pink" onclick="document.forms.addstate.action = 'emitters/publicstate.php';" name="public" type="submit" value="Опубликовать">
                    <input class="btn btn-info" onclick="document.forms.addstate.action = 'emitters/blacklist.php';" name="blacklist" type="submit" value="Сохранить в черновики">
                    
                
            </form>
        </div>
           
           
            </div>
  
  <div id="blog2" class="tab-pane fade col">
    <h4>В разработке</h4>
    <hr>
       
        
  </div>
  <div id="blog3" class="tab-pane fade col">
      <h4>В разработке</h4>
    <hr>
    
    
    
  </div>
               
               
                
            </div>
        </div>
    </div>
</body>
</html>