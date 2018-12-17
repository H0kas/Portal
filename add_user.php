<?php
include 'class/registrationController.php';

if (isset($_POST['registrationButton'])) {
	
	if ((isset($_POST['inputName'])) && (isset($_POST['inputLastName'])) && (isset($_POST['inputEmail'])) && (isset($_POST['inputPassword'])) && (isset($_POST['inputConfirmPassword']))) {
		
		$_SESSION['regName'] = $inputName = filter_input(INPUT_POST, 'inputName');
		$_SESSION['regLastName'] = $inputLastName = filter_input(INPUT_POST, 'inputLastName');
		$_SESSION['regSex'] = $inputSex = filter_input(INPUT_POST, 'inputSex');
		$_SESSION['regEmail'] = $inputEmail = filter_input(INPUT_POST, 'inputEmail');
		$inputPassword = filter_input(INPUT_POST, 'inputPassword');
		$inputConfirmPassword = filter_input(INPUT_POST, 'inputConfirmPassword');
		$complete = true;
		
		if ($inputPassword != $inputConfirmPassword) {
			$_SESSION['communique'] = 'Podane hasła nie są identyczne';
			$complete = false;
			header("Location: registration.php");
			exit();
		}
		
		$userPassLength = mb_strlen($inputPassword, 'UTF-8');
		
		if ($userPassLength < 6 || $userPassLength > 20) {
			$_SESSION['communique'] = 'Hasło musi mieć od 6 do 20 znaków';
			$complete = false;
			header("Location: registration.php");
			exit();
		}
		
		if ((!preg_match('/^[a-żA-Ż ]*$/', $inputName)) || (!preg_match('/^[a-żA-Ż -]*$/', $inputLastName))) {
			$_SESSION['communique'] = 'Imię i nazwisko powinno składać się tylko z liter';
			$complete = false;
			header("Location: registration.php");
			exit();
		}
			
		if ($complete) {
			//include 'class/registrationController.php';
			$ob = new registrationController($inputName, $inputLastName, $inputSex, $inputEmail, $inputPassword);
			//$ob = new registrationController();
			//$ob->registrationUser($inputName, $inputLastName, $inputSex, $inputEmail, $inputPassword);
			$ob->registrationUser();
		}
		
	} else {
		$_SESSION['communique'] = 'Musisz wypełnić wszystkie pola';
		header("Location: registration.php");
		exit();
	}
	
} else {
	header("Location: index.php");
	exit();
}