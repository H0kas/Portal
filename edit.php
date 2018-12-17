<?php
include 'class/userController.php';
		
if (isset($_POST['inputID'])) {

	$inputID = filter_input(INPUT_POST, 'inputID');
	$inputName = filter_input(INPUT_POST, 'inputName');
	$inputLastName = filter_input(INPUT_POST, 'inputLastName');
	$inputSex = filter_input(INPUT_POST, 'inputSex');
	$inputEmail = filter_input(INPUT_POST, 'inputEmail');
	$inputCity = filter_input(INPUT_POST, 'inputCity');
	$inputJob = filter_input(INPUT_POST, 'inputJob');
	$complete = true;

	if ((!preg_match('/^[a-żA-Ż ]*$/', $inputName)) || (!preg_match('/^[a-żA-Ż -]*$/', $inputLastName))) {
		$_SESSION['communique'] = 'Imię i nazwisko powinno składać się tylko z liter';
		$complete = false;
	}
	
	if (!preg_match('/^[a-żA-Ż -]*$/', $inputCity)) {
		$_SESSION['communique'] = 'Podaj poprawne miasto';
		$complete = false;
	}
	
	if ($complete) {
		//include 'class/registrationController.php';
		//$ob = new registrationController($inputName, $inputLastName, $inputSex, $inputEmail, $inputPassword);
		$ajax = array();
		$ajax['ok'] = false;
		
		try {
			$ob = new userController();
			$ob->editUsers($inputID, $inputName, $inputLastName, $inputSex, $inputEmail, $inputCity, $inputJob);
			$ajax['ok'] = true;
			$ajax['msg'] = 'Dane zostały zaktualizowane';
		} catch (Exception $e) {
			$ajax['msg'] = 'Problem za bazą danych. Proszę spróbować później.';
		}
		$ob->sendAjax($ajax);
	}
} else {
	header("Location: show.php");
	exit();
}
