<?php

if (isset($_POST['loginButton'])) {
	
	include 'class/loginController.php';
	$ob = new loginController();
	$ob->login();
	
} else {
	header("Location: index.php");
	exit();
}