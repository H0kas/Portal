<?php
@session_start();

require_once 'baseController.php';

class userController extends baseController {
	//private $id, $imie, $nazwisko, $email, $password;
	
	public function showUser($id) {
		$query = $this->db->prepare("SELECT * FROM users WHERE id = :id");		
		$query->bindValue(':id', $id, PDO::PARAM_STR);
		$query->execute();
		
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function showUsers() {
		$query = $this->db->query("SELECT * FROM users ORDER BY id DESC LIMIT 10");
		
		while ($_row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[]=$_row;
        }
		return $result;
	}
	
	public function editUsers($inputID, $inputName, $inputLastName, $inputSex, $inputEmail, $inputCity, $inputJob) {

		try {
			$query = $this->db->prepare("UPDATE users SET name = :name, lastname = :lastName, sex = :sex, email = :email, city = :city, job = :job WHERE id = :id");
			$query->bindValue(':id', $inputID);
			$query->bindValue(':name', $inputName);
			$query->bindValue(':lastName', $inputLastName);
			$query->bindValue(':sex', $inputSex);
			$query->bindValue(':email', $inputEmail);
			$query->bindValue(':city', $inputCity);
			$query->bindValue(':job', $inputJob);
			$query->execute();
		} catch (\Exception $ex) {
			throw new \Exception('blad z baza');
		}
		return true;
	}
}
