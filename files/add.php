<?php 

$url = "http://localhost/elastic_search_excersie/data.txt";

require_once("../config.php");

require_once("./curl.php");

use Elasticsearch\ClientBuilder;

try{
    $client = ClientBuilder::create()->build();

    foreach(read($url) as $line){
        $res = json_decode(fgets($line));

        $params = [
            'index' => 'rup_index',
            'id' => $res->id,
            'body' => ['data' => $res->doc]
        ];
        
        $response = $client->index($params);
    }
    
    echo 'OK';
}catch(Exception $e){
    print_r($e->getMessage());
}
