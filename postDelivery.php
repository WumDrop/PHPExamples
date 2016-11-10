<?php

 // set data and ensure parameter pickup_by is a GMT+2 Unix timestamp
 $json = '
{
	"pickup_address":"66 Albert Road, Woodstock, Cape Town, South Africa",
	"pickup_contact_name":"Hattori Hanzo",
	"pickup_contact_phone":"0872310223",
	"pickup_remarks":"The sword will be at the reception.", 
	"dropoff_address":"55 Albert Road, Woodstock, Cape Town, South Africa",
	"dropoff_contact_name":"Bill",
	"dropoff_contact_phone":"0212011122",
	"dropoff_remarks":"Make sure Bill knows you are coming", 
	"pickup_coordinates":"-33.926401, 18.444876", 
	"dropoff_coordinates":"-33.944912, 18.472792",
	"order_reference":"BillyJean1",
	"pickup_by":"1478246400"
}

';
// Get cURL resource
$ch = curl_init();

// Set url
curl_setopt($ch, CURLOPT_URL, 'https://api.wumdrop.com/v1/deliveries');

// Set method
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Set headers
curl_setopt($ch, CURLOPT_HTTPHEADER,  [ "Authorization: Basic **API KEY**=", ] );

curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

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