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
	<link rel="stylesheet" href="../CSS/preferences-styles.css">
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
								<span class='login-access'><a class='login-access' href='../HTML/signup.php''>Regístrate</a></span>
							</nav>";
					}
				?>
			</div>
		</header>
		<div id="main-container">
			<p id="main-quote">
				PREFERENCIAS
			</p>
		</div>
		<div id="table-question-container">
			<p id="table-question">
				¿Qué tablas necesitas?
			</p>
			<form action="../HTML/options.php" method="POST" id="table-question-form">
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Películas</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Series</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Animes</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Videojuegos</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Libros</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Música</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Contactos</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Contraseñas</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Información Proyectos</span> 
				
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Cualificaciones Escolares</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Lista de Deseos</span>
				<br>
				<input type="checkbox" class="table-options"> <span class="table-option-quote">Finanzas </span>
				<br>
			</form>
		</div>
		<div id="sharing-question-container">
			<p id="sharing-question">
				¿Quieres compartir tus tablas en tu perfil?
			</p>
			<form action="../HTML/options.php" method="POST" id="sharing-question-form">
				<input type="radio" name="sharing-option" class="radio"> <span class="table-option-quote">Si</span>
				<input type="radio" name="sharing-option" class="radio"> <span class="table-option-quote">No</span> 
			</form>
		</div>
		<div id="send-info-container">
			<form action="../HTML/options.php" method="POST" id="send-info-form">
				<input type="submit" name="send-info" id="send-info-button" value="Guardar datos">
			</form>
		</div>
	</div>
</body>