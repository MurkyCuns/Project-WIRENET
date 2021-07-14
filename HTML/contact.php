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
	<link rel="stylesheet" href="../CSS/contact-styles.css">
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
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/signup.php">Registrate</a></li>
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
							</nav>";
					}
				?>
			</div>
		</header>
		<div id="info-container">
			<p id="info-quote">
				Información <br> de contacto:
			</p>
			<ul id="info-list-container">
				<li class="info-list-item">Email: <span class="yellow">support-wirenetproject@murkycuns.com</span></li>
				<li class="info-list-item">Teléfono Móvil: <span class="yellow">+34 616093217</span></li>
				<li class="info-list-item">Teléfono Fijo: <span class="yellow">+34 981886042</span></li>
				<li class="info-list-item">Página Web: <span class="yellow">wirenetproject.murkycuns.com</span></li>
			</ul>
		</div>
		<div id="social-container">
			<p id="social-quote">
				Redes <br> sociales:
			</p>
			<ul id="social-list-container">
				<li class="social-list-item">Twitter: <span class="yellow">support-wirenetproject@murkycuns.com</span></li>
				<li class="social-list-item">Instagram: <span class="yellow">+34 616093217</span></li>
				<li class="social-list-item">Github: <span class="yellow">+34 981886042</span></li>
				<li class="social-list-item">Página Web: <span class="yellow">wirenetproject.murkycuns.com</span></li>
			</ul>
		</div>
		<div class="hr-container">
			<hr class="delimiter">
		</div>
		<div id="form-container">
			<p id="form-title">
				Envíanos un mensaje.
			</p>
			<form action="">
				<p class="input-title">
					Nombre:
				</p>
				<br>
				<input type="text" name="name" id="name" placeholder="">
				<br>
				<p class="input-title">
					Correo electrónico:
				</p>
				<br>
				<input type="text" name="email" id="email" placeholder="">
				<br>
				<p class="input-title">
					Teléfono:
				</p>
				<br>
				<input type="text" name="phone" id="phone" placeholder="">
				<br>
				<p class="input-title">
					Mensaje:
				</p>
				<br>
				<textarea name="" id="textarea"></textarea>
				<br><br>
				<input type="button" id="button" value="Enviar mensaje">
			</form>
		</div>
		<footer id="footer-container">
			<div id="footer-logo-container">
				<img src="../images/index/header-logo.png" alt="" id="footer-logo">
			</div>
		</footer>
	</div>
</body>
</html>