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
	<link rel="stylesheet" href="../CSS/about-styles.css">
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
						<li class="nav-menu-item"><a class="current" class="nav-menu-item" href="../HTML/about.php">Sobre Nosotros</a></li>
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
			<div id="project-name-container">
				<p id="project-name">¿Qué es Project: WIRENET?</p>
			</div>
			<div id="project-info-container">
				<p id="project-info">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga, rem explicabo debitis laborum facilis dolores ut ratione sequi hic, iste, aliquam. Culpa, quasi, eveniet. Reprehenderit consequatur soluta ipsa, velit a.</p>
			</div>
			<div class="hr-container">
				<hr class="delimiter">
			</div>
			<div id="slogan-container">
				<p id="slogan">
					KEEP YOUR DATA IN YOUR POCKET
				</p>
			</div>
			<div class="hr-container">
				<hr class="delimiter">
			</div>
			<div id="made4left-container">
				<div class="vl"></div>
				<p id="made4title">
					Una aplicación hecha para...
				</p>
				<ul id="made4left-list">
					<li class="made4left-list-item">Lista de Contactos</li>
					<li class="made4left-list-item">Gestor de Contraseñas</li>
					<li class="made4left-list-item">Información de Proyectos</li>
					<li class="made4left-list-item">Y mucho más...</li>
				</ul>
			</div>
			<div id="made4right-container">
				<ul id="made4right-list">
					<li class="made4right-list-item">Registro de Películas</li>
					<li class="made4right-list-item">Registro de Series</li>
					<li class="made4right-list-item">Registro de Libros</li>
					<li class="made4right-list-item">Registro de Videojuegos</li>
				</ul>
			</div>
			<div id="members-title-container">
				<p id="members-title">
					COLABORADORES
				</p>
			</div>
			<div id="members-photo-container">
				<img src="../images/about/members.jpg" alt="" id="members-photo">
			</div>
			<div id="members-info-container">
				<p id="members-info">
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta numquam doloribus, assumenda velit adipisci illum, expedita atque, cumque ullam hic accusantium? Laborum similique, sapiente repudiandae perferendis? Aspernatur fugit ipsa, veritatis.
				</p>
			</div>
			<footer id="footer-container">
			<div id="footer-logo-container">
				<img src="../images/index/header-logo.png" alt="" id="footer-logo">
			</div>
		</footer>
	</div>
</body>
</html>