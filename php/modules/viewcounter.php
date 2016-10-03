<?php

include('config.php');
include('func/funcstatemenu.php');

db_connect(HOST, USER, PASS, DB);

if (isset($_POST['id']))
{
    $resToJson = count_inc($_POST['id']);
}

$res_json = json_encode($resToJson);

echo $res_json;
?>