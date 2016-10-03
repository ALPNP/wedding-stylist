<?php

include('config.php');
include('func/funcstatemenu.php');

db_connect(HOST, USER, PASS, DB);

//print_r $_POST[0];

if ($_POST['respid'] == "get_start")
{
    $sC = gen_start_content();
    $resToJson = text_worker($sC);
}
else
{
    $sC = get_new_content($_POST['respid']);
    $resToJson = text_worker($sC);
//    $resToJson = $sC;
//    $resToJson = strlen($_POST['respid']);
}
// Потом можно дописать как хочешь.

$json = json_encode($resToJson);

echo $json;
?>