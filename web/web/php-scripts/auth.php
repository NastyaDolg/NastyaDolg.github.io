<?php
    include 'db_connection.php';

    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $stmt = $mysql->prepare("SELECT password, name, email FROM `users` WHERE `email` = :email");

    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user_auth = $stmt->fetch();

    if(!$user_auth){
        echo "Неверный логин или пароль!";
        exit();
    }
    else if(!password_verify($pass."hash", $user_auth['password']))
    {
        echo "Неверный логин или пароль!";
        exit();
    }

	session_start();
	$_SESSION["name"] = $user_auth['name'];
	$_SESSION["email"] = $user_auth['email'];
