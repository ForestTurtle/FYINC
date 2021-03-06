<?php
class Reminder
{
	public $ip;
	public $recipient;
	public $time; 
//add, edit, delete, 
//recipient, time;
	function __construct($recipient, $time)
	{

		$this->ip = get_client_ip();
		$this->recipient = $recipient;
		$this->time = $time;
	}

	function edit($recipient, $time)
	{

		$this->ip = get_client_ip();
		$this->recipient = $recipient;
		$this->time = $time;
	}

	function display($i)
	{
		$email = $this->recipient;
		$time = $this->time;
	?>
		<div class="reminder">
			Send to
			<a href="mailto:<?php echo $email ?>?Subject=Notification">
			<?php echo $email ?></a>
				at <?php echo $this->time ?>.
			<form method = 'POST'>
				<input type='submit' value='Delete Reminder'>
				<input type='hidden' name='action' value = 'delete'>
				<input type='hidden' name='action2' value = '<?php echo $i ?>'>
			</form>
			<form method = 'POST'>
				<input type='submit' value='Edit Reminder'>
				<input type='hidden' name='action3' value = 'edit'>
				<input type='hidden' name='action4' value = '<?php echo $i ?>'>
			</form>
		</div>
	<?php
	}

}

class ReminderList
{
	public $reminders = array();

	function displayList()
	{
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){//Remove Reminder
			if(isset($_POST['action']) && $_POST['action'] == "delete"){ //delete is pressed
				echo "Question ".($_POST['action2'])." has been removed from the test.</br>";
				if(isset($this->reminders[$_POST['action2']])){
					unset($this->reminders[$_POST['action2']]);
					$this->reminders = array_values($this->reminders);
					save();
				}
			} else if(isset($_POST['action5']) && $_POST['action5'] == "add3"){ //edit confirmed
				$this->reminders[$_POST['action6']]->edit(get_input($_POST['recipient']),get_input(get_input($_POST['time'])));
				save();
			}
		}
		for ($i = 0; $i < count($this->reminders); $i++) //display del and edit buttons
		{
			$this->reminders[$i]->display($i);
			
			if($_SERVER["REQUEST_METHOD"] == "POST" &&
				isset($_POST['action3']) &&
				$_POST['action3'] == $i)
			{
					echo "<form  method='post'>";
					echo "<input type='text' name = 'recipient' value='Recipient Email'>";
					echo "<input type='text' name = 'time' value='Time to Email'>";
					echo "<input type='submit' name = 'submit' value='Confirm Edit'>";
					echo "<input type='hidden' name='action5' value='add3'>";
					echo "<input type='hidden' name='action6' value='".$_POST['action4']."'>";
					echo "</form>";
			}
		}
	}
	function add($recipient, $time) //TODO
	{
		$recip = new Reminder($recipient, $time);
		$this->reminders[] = $recip;
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

function get_input($data) //get input from text form
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

function  save(){
	$file = fopen("cache.txt", "w");
	fputs($file, session_encode());//save test
	fclose($file);

	$file = fopen("cache.json", "w");
	fputs($file, json_encode($_SESSION['list']));//save test
	fclose($file);
}

function load(){
	$file = fopen("cache.txt", "r");
	session_decode(fgets($file, 40000));//open test
	fclose($file);
}

?>
