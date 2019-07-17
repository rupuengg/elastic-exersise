<?php

class Common{
    public $filename;

    public function __construct($filename){
        $this->filename = DIR_PATH.'/upload/'.$filename;
    }

    public function read(){
        $fp = fopen($this->filename, 'rb');

        while(($line = fgets($fp)) !== false)
            yield rtrim($line, "\r\n");

        fclose($fp);
    }

    public function insert(){
        $client = Elasticsearch\ClientBuilder::create()->build();

        foreach($this->read() as $line){
            $res = json_decode(fgets($line));
            
            $response = $client->index($this->makeIndex($res));
        }
    }

    public function makeIndex($row){
        return [
            'index' => 'my_index',
            'id' => $row->id,
            'body' => ['data' => $row->doc]
        ];
    }
}