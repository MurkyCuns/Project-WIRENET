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
								<br>
								<span class='login-access'><a class='login-access' href='../HTML/signup.php''>Regístrate</a></span>
								</div>
							</nav>";
					}
				?>
			</div>
		</header>
			<div id="main-container">
				<div id="register-quote">Regístrate</div>
				<form action="../HTML/signup.php" method="POST" id="data-form">
					<table id="dataTable">
						<tr>
							<td><span class="input-quote">Nombre</span></td>
							<td><?php echo "<input type='text' name='name' class='inputNewData'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Apellidos</span></td>
							<td><?php echo "<input type='text' name='surname' class='inputNewData'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Nombre de Usuario</span></td>
							<td><?php echo "<input type='text' name='username' class='inputNewData'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Correo Electrónico</span></td>
							<td><?php echo "<input type='text' name='email' class='inputNewData'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Contraseña</span></td>
							<td><?php echo "<input type='text' name='password' class='inputNewData'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Repetir contraseña</span></td>
							<td><?php echo "<input type='text' name='reppassword' class='inputNewData'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Número de teléfono</span></td>
							<td><?php echo "<input type='text' name='phone' class='inputNewData'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Fecha de Nacimiento</span></td>
							<td><?php echo "<input type='text' name='birthdate' class='inputNewData'>"; ?></td>
						</tr>
					</table>
					
					<input type="submit" name="button" value="Registrarse" id="button">
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

										$UserDBName = $_POST['username'] . "db";
										$_SESSION['UserDBName'] = $UserDBName;

										if ($resultado) {
											echo '<div class="successLog"> Su cuenta ha sido creada... Pulse <span class="underlineSuccessLog"><a class="underlineSuccessLog" href="../HTML/index.php">aquí</a></span> para iniciar sesión.';

											mysqli_query($DBConection, "CREATE USER '".$_POST['username']."'@'".$DBHost."' IDENTIFIED BY '".$_POST['password']."';");

											mysqli_query($DBConection, "GRANT ALL ON ".$UserDBName.".* TO '".$_POST['username']."'@'".$DBHost."' WITH GRANT OPTION;");

											$create_query = "CREATE DATABASE " . $UserDBName;

											$create_resultado = mysqli_query($DBConection, $create_query);
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