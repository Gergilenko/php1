<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
</head>
<body>
<form action="index.php" method="post">
	<input type="number" name="digit1" size="5">
	<select name="operation">
		<option value="add" selected>+</option>
		<option value="sub">-</option>
		<option value="mult">*</option>
		<option value="div">/</option>
		<option value="ost">%</option>
	</select>
	<input type="number" name="digit2" size=5>
	<input type="submit" value=" = ">
	</form>
<?php
	
if (!empty($_POST['digit1']) && isset($_POST['digit2'])) {
	
	$d1 = $_POST['digit1'];
	$d2 = $_POST['digit2'];
	$oper = $_POST['operation'];
	
	switch($oper) {
		case "add":
			echo "$d1 + $d2 = ".($d1 + $d2);
			break;
		case "sub":
			echo "$d1 - $d2 = ".($d1 - $d2);
			break;
		case "mult":
			echo "$d1 * $d2 = ".$d1 * $d2;
			break;
		case "div":			
			echo ($d2 == 0) ? "Dividing by Zero!" : "$d1 / $d2 = ".($d1 / $d2); 		
			break;
		case "ost":
			echo ($d2 == 0) ? "Dividing by Zero!" : "$d1 % $d2 = ".($d1 % $d2);
			break;
		default:
			echo "Unknown operation!";							
	}
}
else {
	echo "Enter Digits!";
}

?>
</body>
</html>