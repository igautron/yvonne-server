<?php
header('Access-Control-Allow-Origin: *');  
header('Access-Control-Allow-Methods: POST');


include 'AqsBot.class.php';


$to_me = '1154508851';
$to_yvonne = '-1001438149283';

if (isset($_POST['send-telegram'])) {
	$message = '
name: '.$_POST['name'].'
email: '.$_POST['email'].'
phone: '.$_POST['phone'].'
company: '.$_POST['company'].'
message: '.$_POST['message'];
$message = substr($message, 0, 4000);
	$res = AqsBot::setChatId($to_yvonne)->sendMessage($message);
	echo $res;
}
