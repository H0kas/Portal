<?php
session_start();

if ($_GET['id']) {
	$userID = $_GET['id'];
	include 'class/userController.php';
	$ob = new userController();
	$row = $ob->showUser($userID);
} else {
	header("Location: index.php");
	exit();
}

$communique = '';
if (isset($_SESSION['communique'])) {
	$communique = $_SESSION['communique'];
	unset($_SESSION['communique']);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Portal - twój profil</title>
<!-- Bootstrap core JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/main.css" rel="stylesheet">

  </head>
  <body>
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-7 offset-md-1 py-4 d-flex">
              <h4 class="text-white pr-4"><?=$_SESSION['loggedIn']?></h4>
              <ul style="line-height: 30px;" class="list-unstyled d-flex">
                <li class="pr-3"><a href="show.php?id=<?=$_SESSION['loggedID']?>" class="text-white">Wyświetl profil</a></li>
              </ul>
            </div>
			<div class="col-sm-3 offset-md-1 py-4">
				<a href="main.php" class="text-white pr-3">Strona główna</a>
				<a href="logout.php" class="text-white">Wyloguj się</a>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="main.php" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Portal</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <h1 class="jumbotron-heading pb-5"><?=$userID == $_SESSION['loggedID'] ? $_SESSION['loggedIn'] . ' - Twój profil' : 'Profil użytkownika - ' . $row['name'] . ' ' .$row['lastname']?></h1>
		<div class="container">
			<div class="card mx-auto" style="width:400px">
				<img class="card-img-top" src="upload/<?=$row['avatar']?>" alt="Zdjęcie profilowe" style="width:100%">
				<div class="d-flex">
					<div class="card-body text-left col-sm-5">
						<p class="card-text">Imię:</p>
						<p class="card-text">Nazwisko:</p>
						<p class="card-text">Płeć:</p>
						<p class="card-text">Adres email:</p>
						<p class="card-text">Miasto:</p>
						<p class="card-text">Praca:</p>
					</div>
					<div id="profil-info" class="showw card-body text-left col-sm-7">
						<p id = "name-profile" class="card-text"><?=$row['name']?></p>
						<p id = "lastname-profile" class="card-text"><?=$row['lastname']?></p>
						<p id = "sex-profile" class="card-text"><?=$row['sex'] == 'male' ? 'Mężczyzna' : 'Kobieta'?></p>
						<p id = "email-profile" class="card-text"><?=$row['email']?></p>
						<p id = "city-profile" class="card-text"><?=$row['city']?></p>
						<p id = "job-profile" class="card-text"><?=$row['job']?></p>
					</div>
					<div id="profil-info-input" class="hiddenn card-body text-left col-sm-7">
						<form class="form-signin" id="editForm" action="" method="POST">
							<p class="card-text hiddenn"><input type="text" name="inputID" id="inputID" class="form-control edit-input" value="<?=$row['id']?>"></p>
							<p class="card-text"><input type="text" name="inputName" id="inputName" class="form-control edit-input" value="<?=$row['name']?>" required></p>
							<p class="card-text"><input type="text" name="inputLastName" id="inputLastName" class="form-control edit-input" value="<?=$row['lastname']?>" required></p>
							<p class="card-text">
								<select class="form-control edit-input" name="inputSex" id="inputSex">
								  <option value="male">Mężczyzna</option>
								  <option value="female" <?= $row['sex'] == 'female' ? 'selected' : '' ?>>Kobieta</option>
								</select>
							</p>
							<p class="card-text"><input type="email" name="inputEmail" id="inputEmail" class="form-control edit-input" value="<?=$row['email']?>" required></p>
							<p class="card-text"><input type="text" name="inputCity" id="inputCity" class="form-control edit-input" value="<?=$row['city']?>" required></p>
							<p class="card-text"><input type="text" name="inputJob" id="inputJob" class="form-control edit-input" value="<?=$row['job']?>" required></p>
						</form>
					</div>
				</div>
			</div>
			<p class="text-danger form-error"></p>
			<p class="text-success form-succes"></p>
			<div class="edit-button-box">
				<?=$userID == $_SESSION['loggedID'] ? '<a id="edit-button" class="btn btn-md btn-primary px-3">Edytuj profil</a>
				<a id="edit-back-button" class="btn btn-md btn-primary mx-4 px-3 hiddenn">Wstecz</a>
				<a id="edit-save-button" class="btn btn-md btn-primary mx-4 px-3 hiddenn">Zapisz zmiany</a>' : '';?>
			</div>
		</div>
		  
      </section>

      

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#"><img style="height: 18px;" src="img/arrow_up.svg" alt="go back up"></a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script>
$(document).ready(function(){
    $('#edit-button').click(function(){
        $('#profil-info-input').show();
        $('#profil-info').hide();
        $('#edit-button').hide();
		$('#edit-save-button').show();
		$('#edit-back-button').show();
		$('.form-succes').text('');
		$('.form-error').text('');
    });

	$('#edit-back-button').click(function(){
        $('#profil-info-input').hide();
        $('#profil-info').show();
        $('#edit-button').show();
		$('#edit-save-button').hide();
		$('#edit-back-button').hide();
    });

	$('#edit-save-button').click(function() {
		$.ajax({
			type: 'POST',
			url: 'edit.php',
			dataType: 'json',
			data: $('#editForm').serialize(),
			success: function (response) {
				if (response.ok) {
					$('#profil-info-input').hide();
					$('#profil-info').show();
					$('#edit-button').show();
					$('#edit-save-button').hide();
					$('#edit-back-button').hide();
					$('.form-succes').text(response.msg);
					$('#name-profile').text($('#inputName').val());
					$('#lastname-profile').text($('#inputLastName').val());
					if ($('#inputSex').val() == 'male') {
						$('#sex-profile').text('Mężczyzna');
					} else {
						$('#sex-profile').text('Kobieta');
					}
					$('#email-profile').text($('#inputEmail').val());
					$('#city-profile').text($('#inputCity').val());
					$('#job-profile').text($('#inputJob').val());
				} else {
					$('.form-error').text(response.msg);
				}
			}
		});
	});
});
</script>
  </body>
</html>
