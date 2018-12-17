<?php
session_start();

if (isset($_SESSION['loggedIn'])) {
	header("Location: main.php");
	exit();
}

$communique = '';
if (isset($_SESSION['communique'])) {
	$communique = $_SESSION['communique'];
	unset($_SESSION['communique']);
}
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Portal - rejestracja</title>
<!-- Bootstrap core JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="styles/index.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="add_user.php" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Rejestracja</h1>
	  	  
	  <label for="inputName" class="sr-only">Imię</label>
      <input type="text" name="inputName" class="form-control" <?= isset($_SESSION['regName']) ? 'value="' . $_SESSION['regName'] . '"' : ''?> placeholder="Imię" required autofocus>
	  
	  <label for="inputLastName" class="sr-only">Nazwisko</label>
      <input type="text" name="inputLastName" class="form-control" <?= isset($_SESSION['regLastName']) ? 'value="' . $_SESSION['regLastName'] . '"' : ''?> placeholder="Nazwisko" required>
	  
		<label for="inputSex" class="sr-only">Płeć</label>
			<select class="form-control" name="inputSex">
			  <option value="male">Mężczyzna</option>
			  <option value="female" <?= isset($_SESSION['regSex']) == 'female' ? 'selected' : '' ?>>Kobieta</option>
			</select>
	  
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" name="inputEmail" class="form-control" <?= isset($_SESSION['regEmail']) ? 'value="' . $_SESSION['regEmail'] . '"' : ''?> placeholder="Email" required>
	  
      <label for="inputPassword" class="sr-only">Hasło</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Hasło" required>
	  
	  <label for="inputConfirmPassword" class="sr-only">Powtórz hasło</label>
      <input type="password" name="inputConfirmPassword" class="form-control" placeholder="Powtórz hasło" required>
	  
	  <p class="text-danger"><?=$communique?></p>
	  
	  <input class="form-check-input" type="checkbox" value="" name="inputCheckbox" required>
	  <label class="form-check-label" for="inputCheckbox">Zapoznałem się z regulaminem</label>
		  
      <button class="btn btn-lg btn-primary btn-block" name="registrationButton" type="submit">Utwórz konto</button>
	<a href="index.php" class="btn btn-lg btn-primary btn-block">Wróć</a>
	
    </form>
  </body>
</html>
