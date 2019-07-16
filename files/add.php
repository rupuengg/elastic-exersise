<?php 

require_once("../config.php");

use Elasticsearch\ClientBuilder;

try{
    $client = ClientBuilder::create()->build();
    
    // Insert Document
    $params = [
        'index' => 'rup_index',
        'id' => 'rup_id',
        'body' => ['testField' => 'abc']
    ];
    echo  'sds';
    
    $response = $client->index($params);
    
    echo '<pre>';print_r($response);echo '</pre>';
}catch(Exception $e){
    print_r($e->getMessage());
}
