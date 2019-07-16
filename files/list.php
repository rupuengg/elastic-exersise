<?php 

require_once("../config.php");

use Elasticsearch\ClientBuilder;

try{
    $client = ClientBuilder::create()->build();

    $params = [
        'index' => 'rup_index',
        'id'    => 'rup_id'
    ];

    $response = $client->get($params);
        
    echo '<pre>';print_r($response);echo '</pre>';
}catch(Exception $e){
    print_r($e->getMessage());
}
