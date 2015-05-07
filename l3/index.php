<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
</head>
<body>

<?php

$i = 1;

while ($i < 100){
	if (0 == $i % 3) {
		echo "$i\n";
	}	
	$i++;
}

function arrayRandom($n) {
	$array = [];
	for ($i = 0; $i < $n; $i++) {
		$array[] = mt_rand(0, 1000000);
	}
	rsort($array);
	return $array;
}

$a = arrayRandom(10);
echo "<pre>";
var_dump($a);
echo "</pre>";

$a2 = ['Московская область' => ['Клин', 'Реутов'], 'Ярославская область' => ['Ярославль', 'Рыбинск']];

echo "<ul>";
foreach ($a2 as $key => $value) {
	echo "<li>$key</li>";
	if (is_array($value)) {
		echo "<ul>";
		foreach ($value as $el) {
			echo "<li>$el</li>";
		}
		echo "</ul>";
	}
	
}
echo "</ul>";

?>
</body>
</html>