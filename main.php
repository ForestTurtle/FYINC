
<?php
	require "util.php";
	session_start();
?>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<style>

body {
	background-color: #f7f7ff;
}

a, a:visited {
	color: #6CA68D;
}
a:hover {
	color: #7CB69D;
}

button {

}

#main {
	margin-top: 10px;
}

.reminder {
	min-height: 25;
	padding: 10px;
}

.reminder:nth-child(even) {
	background-color: #FBF6DC;
}

.reminder:nth-child(odd) {
	background-color: #F4E0C6;
}

.reminder > form {
	display: inline;
	float: right;
	margin-bottom: 10px;
}

</style>

<div id="main" class='container'>

<form class='row' method='post'>
	<input class='col-md-4 col-sm-12 col-xs-12' type='text' name = 'recipient' value='Recipient Email'>
	<input class='col-md-4 col-sm-12 col-xs-12' type='text' name = 'time' value='Time to Email'>
	<input class='col-md-4 col-sm-12 col-xs-12' type='submit' name = 'submit' value='Add Reminder'>
	<input type='hidden' name='action' value='add'>
</form>

<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['action']) && $_POST['action'] == "add") {	//adds
			$_SESSION['list']->add(get_input($_POST['recipient']),get_input(get_input($_POST['time'])));
			save();
		}
	}
	
	$_SESSION['list']->displayList();

?>

</div>
