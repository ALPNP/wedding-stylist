<?php
// Крутая штука
//header("Content-Type:text/html;charset=UTF0");

include('config.php');
include('func/funcstatemenu.php');

// Стартуем функцию в файле funcstatemenu.php
db_connect(HOST, USER, PASS, DB);
$statemenu = get_menu();
?>


<ul class="nav nav-stacked headerstatemenu">
    <h4 class="wrapper statemenumain"><b><i class="fa fa-bars" aria-hidden="true"></i> Меню категорий</b></h4>
    <?php foreach($statemenu as $value):
        $submenu = get_submenu($value['id'])
    ?>
   
    <li>
        
        <table style="border-collapse: collapse; table-layot:fixed; width:100%;">
            <tr>
                <td>
                    <button class="btn btn-block btn-pink btn-cat" data="<?=$value['id'];?>" onclick="lassar(this);">
                        <b class="cat-text"><i class="fa fa-book" aria-hidden="true"></i> <?=$value['title'];?></b>
                    </button>
                </td>
            </tr>
        </table>
        
        <?php 
    
    if(!empty($submenu))
    {
    ?>
       <ul class="nav substatemenu submenu">
        <?php foreach($submenu as $value2):?>
           <li class="submenu">
           
           <table style="border-collapse: collapse; table-layot:fixed; width:100%;">
               <tr>
                   <td>
                       <button class="btn btn-tiffany btn-block btn-podcat" data="<?=$value2['podcat']?>" onclick="lassar(this);">
                           <b class="podcat-text"><i class="fa fa-bookmark" aria-hidden="true"></i> <?=$value2['podcat'];?></b>
                       </button>
                   </td>
               </tr>
           </table>
            </li>
    <?php endforeach;?>
    </ul>
    <?php
    }?>
        
    </li>

<?php endforeach;?>
</ul>