<?php
	include 'db_connection.php';
	
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$tel = filter_var(trim($_POST['telefon']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	if(mb_strlen($name) == 0 || mb_strlen($email) == 0 || mb_strlen($tel) == 0 || mb_strlen($pass) == 0){
		echo "Заполните все поля!";
		exit();
	}

	if (!preg_match('/\S+@\S+\.\S+/', $email)){
		echo "Неверно указан email!";
		exit();
	}

	if (!preg_match('/^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/', $tel)){
		echo "Неверно указан номер телефона!";
		exit();
	}

	if(mb_strlen($pass) < 6){
		echo "Слишком короткий пароль!";
		exit();
	}

	$pass = password_hash($pass."hash", PASSWORD_DEFAULT);

	$stmt = $mysql->prepare("SELECT * FROM `users` WHERE email = :email");
	$stmt->bindParam(':email', $email);
	$stmt->execute();

	 $user_check = $stmt->fetch();
	 if($user_check){
	 	echo "Такой пользователь уже есть!";
	 	exit();
	 }
	
	$stmt = $mysql->prepare("INSERT INTO `users` (`name`, `email`, `telefon`, `password`) VALUES(:login, :email, :tel, :pass)");

	$stmt->bindParam(':login', $name);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':tel', $tel);
	$stmt->bindParam(':pass', $pass);
	$stmt->execute();

	session_start();
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email;


