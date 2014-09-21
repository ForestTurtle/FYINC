<?php 
	#!\C:\xampp\php\php.exe;
	require "send.php";
	require "util.php";
	
	function chooseHeader(){
		$headers = array(
			1 => "Hey honey",
			2 => "Hi honey",
			3 => "Honey",
			4 => "Hey baby",
			5 => "Ey yo gurl"
		);
		return $headers[rand(1,5)];
	}
	
	function chooseBody(){
		$bodies = array(
			1 => "I'll be working late.",
			2 => "Still at the office",
			3 => "Start dinner without me; I'm still working",
			4 => "I'll need a couple more hours at the office",
			5 => "I'm working late today.",
			6 => "Still working hard.",
			7 => "I'll be home late.",
			8 => "I'm working late again.",
			9 => "Almost done with this project, I'll be home late.",
		);
		return $bodies[rand(1,9)];
	}
	
	$file = fopen("c:\\xampp\htdocs\hackathon\cache.json", "r");
	$json = fgets($file, 40000);
	$list = json_decode($json);//open test
	fclose($file);
	
	date_default_timezone_set('America/New_York');
	
	
	while(true){
		for($i = 0; $i<count($list->reminders); $i++){
			if($list->reminders[$i]->time < date('Hi')){ //current time past set time, time must be HHMM
				if(true){ //ip is still the same as when made reminder
					sendMessage($list->reminders[$i]->recipient, chooseHeader(), chooseBody());
					$list->reminders[$i]->time = 2500;
				} else { //remove reminder
				}
			}
			//print($list->reminders[$i]->time."<br/>");
		}
		//sendMessage("s24126765@gmail.com", "test", "THis is being sent every10 seconds");
		sleep(10);
	}	

?>