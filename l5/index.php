<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
</head>
<body>
<h1>PHP Level 1 - Lesson #5</h1>

<?php 
if (!empty($_GET['auth'])) {
	switch($_GET['auth']) {
		case "err1":
			echo "This LOGIN and PASSWORD is not registered!"; 
			break;
		case "err2":
			echo "Enter LOGIN and PASSWORD!";
			break;
		default:
			echo "Unknown error";
	}	
} 
if (isset($_SESSION['auth'])) {
	$auth = $_SESSION['auth'];
	$nick = $_SESSION['nick'];
	$count = $_SESSION['visits'];
}

if ($auth) { 
	include('main.phtml');
}
else {
	include('form.html');
}
?>
</body>
</html>