<?php 
	session_start();
	$file = fopen("cache.txt", "r");
	session_decode(fgets($file, 40000));//open test
	fclose($file);

	while(true){
	count($_SESSION['list']->reminders);
		for(){
			if(){ //time is passed
		} 
		
		
		sleep(1000);
	}	
?>