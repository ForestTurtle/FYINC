<?php
require 'src/Mandrill.php';
try{
$mandrill = new Mandrill('S2HODxjklE3a2RgeI6QDyQ');

$message = array(
    'subject' => 'Tsest message send',
    'from_email' => 'jeffersonyawa@gmail.com',
    'html' => '<body>This is a test message with Mandrill\'s PHP wrapper!.</body>',
	'to' => array(array('email' => 's24126765@gmail.com', 'name'=>'Jefferson', 'type'=>'to')),
	'important' => true
);
	$async = false;
	$ip_pool = 'Main Pool';
	$send_at = null;
    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
    print_r($result);
} catch (Mandrill_Error $e) {
	echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
	throw $e;
}
?>