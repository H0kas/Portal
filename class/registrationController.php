<?php
@session_start();

require_once 'baseController.php';
	
class registrationController extends baseController
{
	private $imie, $nazwisko, $sex, $email, $password;
	
	function __construct($inputName, $inputLastName, $inputSex, $inputEmail, $inputPassword) {
		$this->imie = $inputName;
		$this->nazwisko = $inputLastName;
		$this->sex = $inputSex;
		$this->email = $inputEmail;
		$this->password = $inputPassword;
		
		parent::__construct();
	}
	
	/*public function registrationUser($inputName, $inputLastName, $inputSex, $inputEmail, $inputPassword) {
		$this->imie = $inputName;
		$this->nazwisko = $inputLastName;
		$this->sex = $inputSex;
		$this->email = $inputEmail;
		$this->password = $inputPassword;*/
	public function registrationUser() {
		$query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
		$query->bindValue(':email', $this->email, PDO::PARAM_STR);
		$query->execute();
		
		if ($query->rowCount() <> 0) {
			$db = null;
			$_SESSION['communique'] = 'Podany adres email jest już zarejestrowany';
			header("Location: registration.php");
			exit();
		}
		
		$this->sex == 'male' ? $avatarSex = 'start_avatar/male.png' : $avatarSex = 'start_avatar/female.png';
		
		$pass_hash = password_hash($this->password, PASSWORD_DEFAULT);
		
		$query = $this->db->prepare("INSERT INTO users (name, lastname, sex, email, password, avatar) VALUES (:imie, :nazwisko, :sex, :email, :password, :avatar)");
		$query->bindValue(':imie', $this->imie);
		$query->bindValue(':nazwisko', $this->nazwisko);
		$query->bindValue(':sex', $this->sex);
		$query->bindValue(':email', $this->email);
		$query->bindValue(':password', $pass_hash);
		$query->bindValue(':avatar', $avatarSex);
		if ($query->execute()) {
			$_SESSION['registrationSucces'] = 'Konto utworzono pomyślnie.<br>Możesz się zalogować!';
			unset($_SESSION['regName'], $_SESSION['regLastName'], $_SESSION['regEmail'], $_SESSION['regSex']);
			header("Location: index.php");
			exit();
		} else {
			$_SESSION['communique'] = 'Problem za bazą danych. Proszę spróbować później.';
			header("Location: registration.php");
			exit();
		}
	}
}