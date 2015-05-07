<?php
	$db = [ 'admin' => ['password' => '1234', 'nick' => 'Юрий'],
			'vasya' => ['password' => '1111', 'nick' => 'Василий'],
			'troll' => ['password' => '2222', 'nick' => 'Гоблин']			
		];
	
	session_start();
	
	//проверяем пришли ли логин пароль не пустыми
	if (!empty($_POST["login"]) || !empty($_POST["password"])) {
		
	$login = $_POST["login"];
	$password = $_POST["password"];
	
	//проверяем есть ли пользователь в базе
	//проверяем пароль и пишем в сессию
	if (isset($db[$login]) && $db[$login]['password'] == $password) {
		$_SESSION["auth"] = true; 
		$_SESSION["nick"] = $db[$login]['nick'];
		
		//если в куки есть счетчик кол-ва логинов
		if (isset($_COOKIE[$login])) {
			$counter = ++$_COOKIE[$login];			
		}
		else {			
			$counter = 1;
		}
		setcookie($login, $counter, time()+86400);
		$_SESSION["visits"] = $counter;
	}
	else {
		header("Location: index.php?auth=err1");
		exit;
	}
	
	
    //когда авторизовались - переходим на главную
	header("Location: index.php");
	exit;	
		
	}
	//Если пароль/логин пусты - ошибка
	else {
		header("Location: index.php?auth=err2");
		exit;
	}
	
	


?>