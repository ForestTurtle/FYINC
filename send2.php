<?php
require 'src/Mandrill.php';
try{


$mandrill = new Mandrill('S2HODxjklE3a2RgeI6QDyQ');

    $name = 'Example Template';

$template_name = 'example template_name';

$template_content = array(
    array(
        'name' => 'main',
        'content' => 'Hi *|FIRSTNAME|* *|LASTNAME|*, thanks for signing up.'),
    array(
        'name' => 'footer',
        'content' => 'Copyright 2012.')

);
$message = array(
    'subject' => 'Tsest message',
    'from_email' => 'jeffersonyawa@gmail.com',
    'html' => '<p>this is a test message with Mandrill\'s PHP wrapper!.</p>',
    'to' => array(array('email' => 'jeffersonyawa@gmail.com', 'name' => 'Recipient 1')),
    'merge_vars' => array(array(
        'rcpt' => 'jeffersonyawa@gmail.com',
        'vars' => 
        array(
            array(
                'name' => 'FIRSTNAME',
                'content' => 'Recipient 1 first name'
				),
            array(
                'name' => 'LASTNAME',
                'content' => 'Last name'
			)
		)
	))
);
print_r($mandrill->messages->sendTemplate($name, $template_content, $message));
} catch (Mandrill_Error $e) {
echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
throw $e;
}
?>