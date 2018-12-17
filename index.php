<?php
session_start();

if(isset($_SESSION['loggedIn'])) {
	header("Location: main.php");
}

unset($_SESSION['regName'], $_SESSION['regLastName'], $_SESSION['regEmail']);

$communique = '';
if(isset($_SESSION['communique'])) {
	$communique = $_SESSION['communique'];
	unset($_SESSION['communique']);
}

$registrationSucces = '';
if(isset($_SESSION['registrationSucces'])) {
	$registrationSucces = $_SESSION['registrationSucces'];
	unset($_SESSION['registrationSucces']);
}
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Portal - witaj</title>
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
    <form class="form-signin" action="login.php" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Zaloguj się</h1>
	  
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" name="inputEmail" class="form-control" <?= isset($_SESSION['logEmail']) ? 'value="' . $_SESSION['logEmail'] . '"' : ''?> placeholder="Email (brzoza@example.pl)" required autofocus>
	  
      <label for="inputPassword" class="sr-only">Hasło</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Hasło (brzoza)" required>
	  <p class="text-danger"><?=$communique?></p>
	  <p class="text-success"><?= $registrationSucces ? $registrationSucces : '' ?></p>
      <button class="btn btn-lg btn-primary btn-block" name="loginButton" type="submit">Zaloguj się</button>
      <a href="registration.php" class="btn btn-lg btn-primary btn-block">Zarejestruj się</a>
    </form>
  </body>
</html>
