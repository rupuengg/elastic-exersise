<?php

//Initialise the cURL var
$ch = curl_init();

//Get the response from cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//Set the Url
curl_setopt($ch, CURLOPT_URL, 'http://localhost:9200/rup_index/docs/_bulk');

//Create a POST array with the file in it
$postData = array(
    'testData' => 'data.json',
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

// Execute the request
$response = curl_exec($ch);