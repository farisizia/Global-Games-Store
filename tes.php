<?php 
include_once ('functions.php');
$data = "username=admin&password=123&login=";
$curl = curl('http://localhost/account/login/login.php', $data);
$PHP = fetch_value($curl, 'PHPSESSID=', ';');
$headers = array(
    'Cookie: PHPSESSID=' . $PHP
);
$data = "resend_email=";
$curl_email = curl('http://localhost/account/verify-email/verify-email.php', $data, $headers);

var_dump($curl_email);
 