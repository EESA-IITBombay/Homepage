<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('base.php');
require('../config.php');
require_once('Google/Client.php');
require_once('Google/Service/Books.php');
require_once('Google/Service/Calendar.php');

$client_id = "442487432236-cm5umhpn8dh154474ah0eotic80it6no.apps.googleusercontent.com"; //Client ID
$service_account_name = "442487432236-cm5umhpn8dh154474ah0eotic80it6no@developer.gserviceaccount.com"; //Email Address
$key_file_location = getcwd()."/key.p12"; //key.p12

echo pageHeader("Service Account Access");
if ($client_id == "<YOUR_CLIENT_ID>"
    || !strlen($service_account_name)
    || !strlen($key_file_location)) {
  echo missingServiceAccountDetailsWarning();
}

$client = new Google_Client();
$client->setApplicationName("Homepage Apps");
$service = new Google_Service_Books($client);

if (isset($_SESSION['service_token'])) {
  $client->setAccessToken($_SESSION['service_token']);
}
$key = file_get_contents($key_file_location);
$cred = new Google_Auth_AssertionCredentials(
    $service_account_name,
    array('https://www.googleapis.com/auth/books'),
    $key
);
$client->setAssertionCredentials($cred);
if($client->getAuth()->isAccessTokenExpired()) {
  $client->getAuth()->refreshTokenWithAssertion($cred);
}
$_SESSION['service_token'] = $client->getAccessToken();

$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
echo "<h3>Results Of Call:</h3>";
foreach ($results as $item) {
  echo $item['volumeInfo']['title'], "<br /> \n";
}

//echo pageFooter(__FILE__);
?>
