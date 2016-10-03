<?php

function db_connect($host, $user, $pass, $database) {
    $db = @mysql_connect($host, $user, $pass);
    
    if (!$db) {
        exit(mysql_error());
    }
    
    if (!mysql_select_db($database, $db)) {
        exit(mysql_error());
    }
    
    mysql_query("SET NAMES UTF8");
    mysql_select_db($database, $db);
    
    return $db;
};

function get_menu() {
    
    $res_array = [];
    $result = mysql_query("SELECT * FROM statemenu WHERE statemenu.parent ='none' ORDER BY statemenu.id");
    $count = 0;
    
    while($row = mysql_fetch_array($result)) 
    {    
        $res_array[$count] = $row;
        $count++;
    }
    
    return $res_array;
};

function get_submenu($parent) {
    
    $res_array = [];
    $result = mysql_query("SELECT * FROM category WHERE cat ='".$parent."' ORDER BY podcat");
    $count = 0;
    
    while($row = mysql_fetch_array($result)) 
    {    
        $res_array[$count] = $row;
        $count++;
    }
    
    return $res_array;
};

function gen_start_content() {
    
    $res_array = [];
    $count = 0;
    $actualTime = (time() - 604800);
    
    $res_query = "SELECT * FROM states WHERE (id > '".$actualTime."' AND status = 1)";
    
    $result;
    
    // он полюбому будет, проверка ниочём, переписать!!!!!
    // ###################################################
    // ###################################################
    // ###################################################
    // ###################################################
    if (mysql_query($res_query))
    {
        $result = mysql_query($res_query);
        while($row = mysql_fetch_array($result))
        {
            $res_array[$count] = $row;
            $count++;
            
        }
    }
    else
    {
        array_push($res_array, "Статей нет, зайдите позже или выберите интересующую Вас категорию.");
    }
    
    return $res_array;
};

function text_worker($data) {
    
    $res_array = [];
    $count = 0;
    
    foreach($data as $value) {
        $res_array[$count]['id'] = $value['id'];
        
        $res_array[$count]['cat'] = $value['cat'];
        $res_array[$count]['podcat'] = $value['podcat'];
        $res_array[$count]['header'] = $value['header'];
        
        
        $imgStateStore = "img/states/";
        $img = $value['images'];
        $fullDest = $imgStateStore.$img;
                
        $res_array[$count]['images'] = $fullDest;
        
        $valtext = $value['statetext'];
        $res_array[$count]['text'] = $valtext;
        $res_array[$count]['view'] = $value['view'];
        
        $count++;
    }
  
    return $res_array;
}

function count_inc($id) {
    
    $res = mysql_query("UPDATE states SET view = view + 1 WHERE (id = ".$id.")");
    
    return $res_status = "ok";
}

function get_new_content($resp) {
    
    $res_array = [];
    $count = 0;
    
    if (strlen($resp) < 5) 
    {
        $res_query = "SELECT * FROM states WHERE (cat = '".$resp."' AND status = 1)";
    }
    else
    {
        $res_query = "SELECT * FROM states WHERE (podcat = '".$resp."' AND status = 1)";
    }
    
    $result;
    // он полюбому будет, проверка ниочём, переписать!!!!!
    // ###################################################
    // ###################################################
    // ###################################################
    // ###################################################
    if (mysql_query($res_query))
    {
        $result = mysql_query($res_query);
        while($row = mysql_fetch_array($result))
        {
            $res_array[$count] = $row;
            $count++;
            
        }
    }
    else
    {
        array_push($res_array, "Статей нет, зайдите позже или выберите интересующую Вас категорию.");
    }
    
    return $res_array;
};
?>