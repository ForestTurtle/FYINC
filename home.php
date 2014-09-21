<?php
class Reminder
{
	public $ip;
	public $recipient;
	public $time; 

	function construct($recipient, $time)
	{

		$ip = get_client_ip();
		$this->recipient = $recipient;
		$this->time = $time;
	}

	function edit($recipient, $time)
	{

		$ip = get_client_ip();
		$this->recipient = $recipient;
		$this->time = $time;
	}

	function display()
	{



	}

	function delete()
	{
		$this = NULL;
	}
}

class ReminderList
{
	public $Reminders = array();


	function displayList()
	{
		for ($i = 0; i < count($Reminders); i++)
		{

			$Reminders[$i]->display();
		}
	}
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function sendMessage($recipient)
{

print_r($mandrill->messages->sendTemplate($name, $template_content, $message));


}

while(!$disabled)
{
	for($i = 0; $i < $listOfReminders; $i++)
	if (date('i') > $time && get_client_ip() === $ip)	// currentTime and currentIP unchecked
	{
		sendMessage(recipient);
		$disabled = TRUE;
	}
}



$message = array(
    'subject' => ('greeting' => rand(0,5)).('excuse' => rand(0,7))),
    'from_email' => 'userEmail',
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