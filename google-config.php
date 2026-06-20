<?php
require_once 'vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setClientId('PUT_CLIENT_ID_HERE');
$google_client->setClientSecret('PUT_CLIENT_SECRET_HERE');
$google_client->setRedirectUri('http://localhost:8000/google-callback.php');
$google_client->addScope('email');
$google_client->addScope('profile');
?>

