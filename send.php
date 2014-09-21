<?php
require 'src/Mandrill.php';

function sendMessage($recipient, $subject, $body) {
	try{
	$mandrill = new Mandrill('S2HODxjklE3a2RgeI6QDyQ');

	$message = array(
		'subject' => $subject,
		'from_email' => 'jeffersonyawa@gmail.com',
		'html' => '<body>'.$body.'</body>',
		'to' => array(array('email' => $recipient, 'name'=>'Jefferson', 'type'=>'to')),
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
}
?>