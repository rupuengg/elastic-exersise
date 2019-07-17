<?php 
require_once "../config.php";

try{
    $filename = "data.txt";

    $obj = new Common($filename);

    $obj->insert();
    
    echo 'OK';
}catch(Exception $e){
    print_r($e->getMessage());
}
