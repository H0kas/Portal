<?php
@session_start();

require_once 'baseController.php';

class loginController extends baseController {
	private $email, $password;

	public function login()	{
		if (!isset($_POST['inputEmail']) || !isset($_POST['inputPassword'])) {
			$_SESSION['communique'] = 'Podaj login i hasło';
			header("Location: index.php");
			exit();
		} else {
			$_SESSION['logEmail'] = $this->email = filter_input(INPUT_POST, 'inputEmail');
			$this->password = filter_input(INPUT_POST, 'inputPassword');
		}
		
		$query = $this->db->prepare("SELECT id, name, lastname, password, avatar FROM users WHERE email = :email");		
		$query->bindValue(':email', $_POST['inputEmail'], PDO::PARAM_STR);
		
		if (!$query->execute()) {
			$_SESSION['communique'] = 'Podaj poprawny adres email';
			header("Location: index.php");
			exit();
		}
		
		if ($query->rowCount() <> 1) {
			$_SESSION['communique'] = 'Podaj poprawny adres email';
			header("Location: index.php");
			exit();
		} else {
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$pass_db = $row['password'];	
						
			if (password_verify($this->password, $pass_db)) {
				$this->userID($row['id'], $row['name'], $row['lastname']);
				unset($_SESSION['logEmail']);
				header("Location: main.php");
			} else {
				$_SESSION['communique'] = 'Podaj poprawne hasło';
				header("Location: index.php");
				exit();
			}
		}
	}

	public function userID($id, $imie, $nazwisko) {
		$_SESSION['loggedID'] = $id;
		$_SESSION['loggedIn'] = $imie . ' ' . $nazwisko;
	}	
}