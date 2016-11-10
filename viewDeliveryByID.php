<?php

// Get cURL resource
$ch = curl_init();

// Set url
curl_setopt($ch, CURLOPT_URL, 'https://api.wumdrop.com/v1/deliveries/[id]');

// Set method
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Set headers - AUTHORIZATION: API KEY
curl_setopt($ch, CURLOPT_HTTPHEADER,  [ "Authorization: Basic **API KEY**"", ] );

// Send the request & save response to $resp
$resp = curl_exec($ch);


if(!$resp) {
  die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
} else {
  echo "Response HTTP Status Code : " . curl_getinfo($ch, CURLINFO_HTTP_CODE);
  echo "\nResponse HTTP Body : " . $resp;
}


// Close request to clear up some resources
curl_close($ch);

?>