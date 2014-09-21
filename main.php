
<?php
require "util.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (isset($_POST['action']) && $_POST['action'] == "add") { //display add UI
		echo "<form  method='post'>";
		echo "<input type='text' name = 'recipient' value='Recipient Email'>";
		echo "<input type='text' name = 'time' value='Time to Email'>";
		echo "<input type='submit' name = 'submit' value='Add Reminder'>";
		echo "<input type='hidden' name='action' value='add2'>";
		echo "</form>";
	} else {
		echo "<form  method='post'>";
		echo "<input type='submit' name = 'submit' value='Add Reminder'>";
		echo "<input type='hidden' name='action' value='add' />";
		echo "</form>";
	}
	if(isset($_POST['action']) && $_POST['action'] == "add2") {	//adds
		$_SESSION['list']->add(get_input($_POST['recipient']),get_input(get_input($_POST['time'])));
		save();
	}
} else { //display add button
	
	echo "<form  method='post'>";
	echo "<input type='submit' name = 'submit' value='Add Reminder'>";
	echo "<input type='hidden' name='action' value='add' />";
	echo "</form>";
}

$disabled = true;
while(!$disabled)
{
	for($i = 0; $i < $listOfReminders; $i++)
	if (date('i') > $time && get_client_ip() === $ip)	// currentTime and currentIP unchecked
	{
		sendMessage(recipient);
		$disabled = TRUE;
	}
}

$_SESSION['list']->displayList();

/*
$message = array(
    'subject' => ('greeting' => rand(0,5)).('excuse' => rand(0,7)),
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
);*/
?>