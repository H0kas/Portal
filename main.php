<?php
session_start();

if (isset($_SESSION['loggedID'])) {
	include 'class/userController.php';
	$ob = new userController();
	$result = $ob->showUsers();
} else {
	header("Location: index.php");
	exit();
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Portal</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
        <div class="container">
          <h1 class="jumbotron-heading">Witaj <?=$_SESSION['loggedIn']?></h1>
          <p class="lead text-muted">Jak Ci mija dzień?<br><br>Na stronie głównej możesz podejrzeć ostatnio zarejestrowanych użytkowników lub wyświetlić i edytować swój profil wybierając odpowiednią pozycję z menu.</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
			<h4 style="padding-bottom: 50px;">Niedawno dołączyli:</h4>
          <div class="row">
		  
		  <?php
			foreach ($result as $row) {
				echo '
					<div class="card mx-auto" style="width:200px; margin-bottom: 50px;">
						<a class="card-link" href="show.php?id=' . $row['id'] . '">
						<img class="card-img-top" src="upload/' . $row['avatar'] . '" alt="Zdjęcie profilowe" style="height: 200px;">
						<div class="card-body text-left">
							<p class="card-text">' . $row['name'] . ' ' . $row['lastname'] . '</p>
							<p class="card-text">' . $row['email'] . '</p>
						</div>
						</a>
					</div>';
			}      
		?>

          </div>
        </div>
      </div>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

  </body>
</html>
