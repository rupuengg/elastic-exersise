<?php 
require_once "../config.php";
    
header('Content-Type:application/json');

$docId = !empty($_GET['doc_id']) ? $_GET['doc_id'] : 'ufIxzS49-18lkor8Wg-Akq4R';

try{
    $filename = "data.txt";

    $obj = new Common($filename);

    // Pass Index Id
    $res = $obj->getDoc($docId);

    // Show output as JSON
    echo json_encode($res);
}catch(Exception $e){
    print_r($e->getMessage());
}
