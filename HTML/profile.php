<?php

	session_start();

	$DBHost = "localhost";
	$DBUsername = "root";
	$DBPassword = "";
	$DBName = "project: wirenet";

	$DBConection = mysqli_connect($DBHost, $DBUsername, $DBPassword, $DBName);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Brais Cuns Varela (MurkyCuns)">
	<meta name="description" content="Murky Studios Database">
	<link rel="stylesheet" href="../CSS/profile-styles.css">
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
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/index.php">Inicio</a></li>
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/about.php">Sobre Nosotros</a></li>
						<li class="nav-menu-item"><a class="current" class="nav-menu-item" href="../HTML/contact.php">Contacto</a></li>
					</ul>
				</nav>
			</div>
			<div id="session-container">
				<?php 
					if ($_SESSION) {
						echo "<nav>
								<div id='login-container'>Hola, 
								<span class='login-user'><a class='login-user' href='../HTML/profile.php''>". $_SESSION['username'] ."</a></span>
								</div>
							</nav>";
					} else {
						echo "<nav>
								<div id='login-container'>
								<span class='login-access'><a class='login-access' href='../HTML/index.php'>Iniciar Sesión</a></span>
								</div>
								<span class='login-access'><a class='login-access' href='../HTML/signup.php''>Regístrate</a></span>
							</nav>";
					}
				?>
			</div>
		</header>
		<div id="main-container">
			<div id="profile-picture-container">
				<img src="../images/profile/user-picture.png" alt="" id="profile-picture">
			</div>

			<div id="info-container" class="c-section">
				<?php 
					$query = "SELECT * FROM users";
					$result = mysqli_query($DBConection, $query);

					while ($row = mysqli_fetch_object($result)) {

						if ($_SESSION['username'] == $row->username) {
							$username = $row->username;
							$name = $row->name;
							$surname = $row->surname;
							$email = $row->email;
							$phone = $row->phone;
							$birthdate = $row->birthdate;

							$_SESSION['username'] = $username;
							$_SESSION['name'] = $name;
							$_SESSION['surname'] = $surname;
							$_SESSION['email'] = $email;
							$_SESSION['phone'] = $phone;
							$_SESSION['birthdate'] = $birthdate;
						}
					}

					echo "<div id='username'>". $username ."</div>
							<div id='name'>". $name . " " . $surname ."</div>
							<div id='email'>". $email ."</div>";

				?>
			</div>
			<div id="follow-button-container">
				<button id="follow-button">
					Añadir amigo
				</button>
			</div>
			<div id="config-container">
				<div id="edit-button">
					<form action="../HTML/profile.php" method="POST">
						<input type="submit" name="editProfile" id="edit-button" value="Editar perfil">
					</form>
				</div>
				<div id="logout-button">
					<form action="../HTML/profile.php" method="POST">
						<input type="submit" name="button" id="logout-button" value="Cerrar sesión">
					</form>
					<?php
						if (isset($_POST['editProfile'])) {
							header("Location: ../HTML/editProfile.php", TRUE, 301);
								exit();
						}

						if (isset($_POST['button'])) {
							session_destroy();
							header("Location: ../HTML/index.php", TRUE, 301);
								exit();
						}
					?>
				</div>
			</div>
			<footer id="footer-container">
			<div id="footer-logo-container">
				<img src="../images/index/header-logo.png" alt="" id="footer-logo">
			</div>
		</footer>
		</div>
	</div>