<?php

	session_start();

	$DBHost = "localhost";
	$DBUsername = "root";
	$DBPassword = "";
	$DBName = "project: wirenet";

	$DBConection = mysqli_connect($DBHost, $DBUsername, $DBPassword, $DBName);

?>

<?php

	if (isset($_SESSION['userLogged'])) {
		if ($_SESSION['userLogged'] == 1) {
			header("Location: ../HTML/tables.php", TRUE, 301);
			exit();
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Brais Cuns Varela (MurkyCuns)">
	<meta name="description" content="Murky Studios Database">
	<link rel="stylesheet" href="../CSS/index-styles.css">
	<title>Inicio - Project: WIRENET</title>
</head>
<body>
	<div class="grid-container">
			<header>
			<div id="header-logo-container">
				<img src="../images/index/header-logo.png" alt="" id="header-logo">
			</div>
			<div id="nav-container">
				<nav id="nav-menu">
					<ul id="nav-menu-list">
						<li class="nav-menu-item"><a class="current" class="nav-menu-item" href="../HTML/index.php">Inicio</a></li>
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/about.php">Sobre Nosotros</a></li>
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/contact.php">Contacto</a></li>
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/signup.php">Registrate</a></li>
					</ul>
				</nav>
			</div>
			<div id="session-container">
				<?php 
					if ($_SESSION) {
						echo "<nav>
								<div id='login-container'>Hola, 
								<span class='login-user'><a class='login-user' href='../HTML/profile.php'>". $_SESSION['username'] ."</a></span>
								</div>
							</nav>";
					} else {
						echo "<nav>
								<div id='login-container'>
								<span class='login-access'><a class='login-access' href='../HTML/index.php'>Iniciar Sesión</a></span>
								</div>
							</nav>";
					}
				?>
			</div>
		</header>
		<div id="main-logo-container">
			<img src="../images/index/Murky Studios Database.png" alt="" id="main-logo">
		</div>
		<div id="main-login-form-container">
			<form id="main-login-form" action="../HTML/index.php" method="POST">
				<input type="text" id="username" name="username" placeholder="Usuario">
				<br>
				<input type="password" id="password" name="password" placeholder="Contraseña">
				<br>
				<input type="submit" id="send-info-button" name="send-info-button" value="Iniciar Sesión">
			</form>
			<?php 
				if (isset($_POST['send-info-button'])) {
					if ($_POST['username'] == '' or $_POST['password'] == '') {
						echo '<div class="errorLog">Debe rellenar todos los campos para iniciar sesión.</div>';
					} else {
						$query = "SELECT * FROM users";
						$result = mysqli_query($DBConection, $query);

						while ($row = mysqli_fetch_object($result)) {
							if ($row->username != $_POST['username'] or $row->password != $_POST['password']) {
								$contador = 1;
							}

							if ($row->username == $_POST['username'] and $row->password == $_POST['password']) {

								$_SESSION['username'] = $row->username;

								$userLogged = 1;

								$_SESSION['userLogged'] = $userLogged;

								header("Location: ../HTML/tables.php", TRUE, 301);
								exit();
							}
						}

						if ($contador = 1) {
							echo '<div class="errorLog">El usuario o la contraseña son incorrectos.</div>';
						}
					}
				}
			?>
		</div>
		<div id="register-question-container">
			<p id="register-question">
				<a href="../HTML/signup.php">¿No tienes una cuenta?</a>
			</p>
		</div>
		<footer id="footer-container"
		>
			<div id="footer-logo-container">
				<img src="../images/index/header-logo.png" alt="" id="footer-logo">
			</div>
		</footer>
	</div>
</body>
</html>