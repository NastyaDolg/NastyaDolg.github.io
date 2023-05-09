<?php
	session_start();
	$_SESSION["name"] = null;
	$_SESSION["email"] = null;
	header('Location: /');