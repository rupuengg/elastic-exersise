<?php

require 'vendor/autoload.php';

function read($file){
    $fp = fopen($file, 'rb');

    while(($line = fgets($fp)) !== false)
        yield rtrim($line, "\r\n");

    fclose($fp);
}