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
	<link rel="stylesheet" href="../CSS/signup-styles.css">
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
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/contact.php">Contacto</a></li>
						<li class="nav-menu-item"><a class="current" class="nav-menu-item" href="../HTML/signup.php">Registrate</a></li>
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
								<span class='login-access'><a class='login-access' href='../HTML/index.php''>Iniciar Sesión</a></span>
								</div>
							</nav>";
					}
				?>
			</div>
		</header>
			<div id="main-logo-container">
				<img id="main-logo" src="../images/index/Murky Studios Database.png" alt="">
			</div>
			<div id="main-form-container">
				<p id="form-title">
					Regístrate
				</p>
				<form id="main-form" action="../HTML/signup.php" method="POST">
					<input type="text" class="input-box" name="name" placeholder="Nombre">
					<br>
					<input type="text" class="input-box" name="surname" placeholder="Apellidos">
					<br>
					<input type="text" class="input-box" name="username" placeholder="Nombre de Usuario">
					<br>
					<input type="password" class="input-box" name="password" placeholder="Contraseña">
					<br>
					<input type="password" class="input-box" name="reppassword" placeholder="Repetir Contraseña">
					<br>
					<input type="text" class="input-box" name="email" placeholder="Correo Electrónico">
					<br>
					<input type="text" class="input-box" name="phone" placeholder="Número de Teléfono">
					<br>
					<input type="text" class="input-box" name="birthdate" placeholder="Fecha de Nacimiento">
					<br>
					<br>
					<input type="submit" id="button" name="button" value="Regístrate">
				</form>
				<?php 
					if(isset($_POST['button'])) {
						if($_POST['name'] == '' or $_POST['surname'] == '' or $_POST['username'] == '' or $_POST['password'] == '' or $_POST['email'] == '' or $_POST['phone'] == '' or $_POST['birthdate'] == '') {
							echo '<div class="errorLog">Debe rellenar todos los campos.</div>';
						} else {
							$query = "SELECT * FROM users";
							$result = mysqli_query($DBConection, $query);

							while ($row = mysqli_fetch_object($result)) {
								if ($row->username == $_POST['username']) {
									echo '<div class="errorLog">El nombre de usuario ya existe.</div>';
								} else {
									if ($_POST['password'] == $_POST['reppassword']) {
										$name = $_POST['name'];
										$surname = $_POST['surname'];
										$username = $_POST['username'];
										$password = $_POST['password'];
										$email = $_POST['email'];
										$phone = $_POST['phone'];
										$birthdate = $_POST['birthdate'];

										$insert_query = "INSERT INTO users (name, surname, username, email, password, phone, birthdate) VALUES ('$name', '$surname', '$username', '$email', '$password', '$phone', '$birthdate')";
										$resultado = mysqli_query($DBConection, $insert_query);

										if ($resultado) {
											echo '<div class="successLog"> Su cuenta ha sido creada... Pulse <span class="underlineSuccessLog"><a class="underlineSuccessLog" href="../HTML/index.php">aquí</a></span> para iniciar sesión.';
										}

									} else {
										echo '<div class="errorLog">Las contraseñas introducidas deben ser iguales.</div>';
									}
								}
							}

						}
					}
				?>
			</div>
			<footer id="footer-container">
				<div id="footer-logo-container">
					<img src="../images/index/header-logo.png" alt="" id="footer-logo">
				</div>
			</footer>
	</div>
</body>
</html>