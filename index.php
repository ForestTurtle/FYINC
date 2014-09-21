<html>
<head>
<title>
Mandrill hack
</title>
</head>
<body>
<?php
require "util.php";
session_start();

$_SESSION['list'] = new ReminderList(); 

load();
header("location: main.php");
?>
</body>
</html>