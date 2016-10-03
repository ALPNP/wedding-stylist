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
</head>
<body>
    <?php require('../modules/adminmenu.php');?>
    <div class="container">
       <div class="row">
           <div class="col-xs-12 col wrapper">
                <h3><i class="fa fa-cubes" aria-hidden="true"></i> Редактор контента</h3>
           </div>
           
<div class="col-xs-12 col">
<h4 class="wrapper">Редактор категорий</h4>
 <div class="col-sm-6 adminframe">
     <h4 class="wrapper">Существующее дерево категорий</h4>
     <hr>
                            
                            
<!--
<div class="form-group">
                    <label class="control-label" for="podcat">Создать подкатегорию:</label>
                     
                        <input class="form-control" onchange="validator(this)" type="text" name="podcat" placeholder="Название подзаголовка" type="text">
                        
                        <input id='podcatbtn' class='btn btn-pink' disabled type='submit' value='Создать'>
                    </div>
-->
                           
                           
                            
                            <ul>
                                <h4>Образ невесты</h4>
                                
                <?php
                    $select = "SELECT * FROM `category` WHERE cat = '1' ORDER BY id DESC";

                    if ($result = $db->query($select)) 
                    { 
                        while ($row = $result->fetch_row()) 
                        { 
                            $form = "<div class='form-group col'>
                                        <form name='form' role='form' method='post' action='emitters/podcatdel.php'>
                                        <input name='id' type='text' value=".$row[0]." hidden >
                                        <p>".$row[2]."<input style='float:right;' class='btn btn-pink' type='submit' value='удалить'></p>
                                        
                                        
                                        </form>
                                     </div>";
                            echo $form;
                        }
                    } 
                ?>
                                
                            </ul>
     
                            <ul>
                                <h4>Стили невест</h4>
       
                <?php
                    $select = "SELECT * FROM `category` WHERE cat = '2' ORDER BY id DESC";

                    if ($result = $db->query($select)) 
                    { 
                        while ($row = $result->fetch_row()) 
                        { 
                            $form = "<div class='form-group col'>
                                        <form name='form' role='form' method='post' action='emitters/podcatdel.php'>
                                        <input name='id' type='text' value=".$row[0]." hidden >
                                        <p>".$row[2]."<input style='float:right;' class='btn btn-pink' type='submit' value='удалить'></p>
                                        
                                        
                                        </form>
                                     </div>";
                            echo $form;
                        }
                    } 
                ?>
          
                            </ul>
                            
                            <ul>
                                <h4>Макияж</h4>
                  <?php
                    $select = "SELECT * FROM `category` WHERE cat = '3' ORDER BY id DESC";

                    if ($result = $db->query($select)) 
                    { 
                        while ($row = $result->fetch_row()) 
                        { 
                            $form = "<div class='form-group col'>
                                        <form name='form' role='form' method='post' action='emitters/podcatdel.php'>
                                        <input name='id' type='text' value=".$row[0]." hidden >
                                        <p>".$row[2]."<input style='float:right;' class='btn btn-pink' type='submit' value='удалить'></p>
                                        
                                        
                                        </form>
                                     </div>";
                            echo $form;
                        }
                    } 
                ?>          
                            </ul>
                            
                            <ul>
                                <h4>Прически</h4>
                  <?php
                    $select = "SELECT * FROM `category` WHERE cat = '4' ORDER BY id DESC";

                    if ($result = $db->query($select))
                    { 
                        while ($row = $result->fetch_row()) 
                        { 
                            $form = "<div class='form-group col'>
                                        <form name='form' role='form' method='post' action='emitters/podcatdel.php'>
                                        <input name='id' type='text' value=".$row[0]." hidden >
                                        <p>".$row[2]."<input style='float:right;' class='btn btn-pink' type='submit' value='удалить'></p>
                                        
                                        
                                        </form>
                                     </div>";
                            echo $form;
                        }
                    } 
                ?>          
                            </ul>
                            
                            <ul>
                                <h4>Подготовка к макияжу</h4>
                  <?php
                    $select = "SELECT * FROM `category` WHERE cat = '5' ORDER BY id DESC";

                    if ($result = $db->query($select)) 
                    { 
                        while ($row = $result->fetch_row()) 
                        { 
                            $form = "<div class='form-group col'>
                                        <form name='form' role='form' method='post' action='emitters/podcatdel.php'>
                                        <input name='id' type='text' value=".$row[0]." hidden >
                                        <p>".$row[2]."<input style='float:right;' class='btn btn-pink' type='submit' value='удалить'></p>
                                        
                                        
                                        </form>
                                     </div>";
                            echo $form;
                        }
                    } 
                ?>          
                            </ul>
                            
                            <ul>
                                <h4>Подготовка к прическе</h4>
                  <?php
                    $select = "SELECT * FROM `category` WHERE cat = '6' ORDER BY id DESC";

                    if ($result = $db->query($select)) 
                    { 
                        while ($row = $result->fetch_row()) 
                        { 
                            $form = "<div class='form-group col'>
                                        <form name='form' role='form' method='post' action='emitters/podcatdel.php'>
                                        <input name='id' type='text' value=".$row[0]." hidden >
                                        <p>".$row[2]."<input style='float:right;' class='btn btn-pink' type='submit' value='удалить'></p>
                                        
                                        
                                        </form>
                                     </div>";
                            echo $form;
                        }
                    } 
                ?>          
                            </ul>
                            
                            <ul>
                                <h4>Репетиция</h4>
                  <?php
                    $select = "SELECT * FROM `category` WHERE cat = '7' ORDER BY id DESC";

                    if ($result = $db->query($select)) 
                    { 
                        while ($row = $result->fetch_row()) 
                        { 
                            $form = "<div class='form-group col'>
                                        <form name='form' role='form' method='post' action='emitters/podcatdel.php'>
                                        <input name='id' type='text' value=".$row[0]." hidden >
                                        <p>".$row[2]."<input style='float:right;' class='btn btn-pink' type='submit' value='удалить'></p>
                                        
                                        
                                        </form>
                                     </div>";
                            echo $form;
                        }
                    } 
                ?>          
                            </ul>
                            
                            <ul>
                                <h4>Последние тенденции</h4>
                  <?php
                    $select = "SELECT * FROM `category` WHERE cat = '8' ORDER BY id DESC";

                    if ($result = $db->query($select)) 
                    { 
                        while ($row = $result->fetch_row()) 
                        { 
                            $form = "<div class='form-group col'>
                                        <form name='form' role='form' method='post' action='emitters/podcatdel.php'>
                                        <input name='id' type='text' value=".$row[0]." hidden >
                                        <p>".$row[2]."<input style='float:right;' class='btn btn-pink' type='submit' value='удалить'></p>
                                        
                                        
                                        </form>
                                     </div>";
                            echo $form;
                        }
                    } 
                ?>          
                            </ul>
                            
     <?php
     
     ?>
     
     
     
 </div>
 
     <div class="col-xs-6 adminframe">
         <h4 class="wrapper">Создать подкатегорию</h4>
         <hr>
         
         <script src="../public/js/podcatvalidator.js"></script>
         <form name="form" role="form" method="post" action='emitters/podcat.php'>
                   
                    <div class="form-group">
                       <label class="control-label" for="cat">Выбор категории:</label>
                        <select class="form-control" name="cat" id="">
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
                    <label class="control-label" for="podcat">Создать подкатегорию:</label>
                    <!-- Form Control -->
                        <input class="form-control" onkeyup="validator(this);" type="text" name="podcat" placeholder="Название подзаголовка" type="text">
                        <br>
                        <p class="text text-danger"><strong>Минимальная длинна подкатегории - 5 символов.</strong></p>
                        <p class="text text-danger"><strong>Максимальная длинна подкатегории - 40 символов.</strong></p>
                    </div>
                    
                    <input id="podcatbtn" class="btn btn-pink" disabled type="submit" value="Создать">
            </form>
         
            
     </div>

 

            
        </div>
</body>
</html>