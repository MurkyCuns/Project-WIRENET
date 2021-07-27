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
	<link rel="stylesheet" href="../CSS/editProfile-styles.css">
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
				<img src="../images/about/members.jpg" alt="" id="profile-picture">
				<form action="../HTML/editProfile.php" method="POST" id="profile-picture-form">
					<label for="file-upload" class="custom-file-upload">
   						Cambiar foto de perfil
					</label>
					<input type="file" name="newProfilePicture" id="file-upload">
				</form>
			</div>
			<div id="data-container">
				<form action="../HTML/editProfile.php" method="POST" id="data-form">
					<table id="dataTable">
						<tr>
							<td><span class="input-quote">Nombre</span></td>
							<td><?php echo "<input type='text' name='name' class='inputNewData' placeholder='".$_SESSION['name']."'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Apellidos</span></td>
							<td><?php echo "<input type='text' name='surname' class='inputNewData' placeholder='".$_SESSION['surname']."'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Nombre de Usuario</span></td>
							<td><?php echo "<input type='text' name='username' class='inputNewData' placeholder='".$_SESSION['username']."'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Correo Electrónico</span></td>
							<td><?php echo "<input type='text' name='email' class='inputNewData' placeholder='".$_SESSION['email']."'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Número de teléfono</span></td>
							<td><?php echo "<input type='text' name='phone' class='inputNewData' placeholder='".$_SESSION['phone']."'>"; ?></td>
						</tr>
						<tr>
							<td><span class="input-quote">Fecha de Nacimiento</span></td>
							<td><?php echo "<input type='text' name='birthdate' class='inputNewData' placeholder='".$_SESSION['birthdate']."'>"; ?></td>
						</tr>
						<tr class="spacing"><td class="spacing"></td><td class="spacing"></td></tr>
						<tr>
							<td><span class="input-quote">Anterior contraseña</span></td>
							<td><input type="password" name="oldPassword" class="inputNewData" placeholder="*********"></td>
						</tr>
						<tr>
							<td><span class="input-quote">Nueva contraseña</span></td>
							<td><input type="password" name="newPassword" class="inputNewData" placeholder="*********"></td>
						</tr>
						<tr>
							<td><span class="input-quote">Repetir contraseña</span></td>
							<td><input type="password" name="newPasswordRepeat" class="inputNewData" placeholder="*********"></td>
						</tr>
					</table>
					
					
					<input type="submit" name="sendNewData" value="Actualizar datos del perfil" id="sendNewDataButton">
					<input type="submit" name="backToProfile" value="Volver al perfil" id="backToProfile">
				</form>
				<?php

					if (isset($_POST['sendNewData'])) {

						$successVar = 1;

						if ($_POST['name'] == '') {
							$name = $_SESSION['name'];
						} else {
							$name = $_POST['name'];
						}

						if ($_POST['surname'] == '') {
							$surname = $_SESSION['surname'];
						} else {
							$surname = $_POST['surname'];
						}

						if ($_POST['username'] == '') {
							$username = $_SESSION['username'];
						} else {
							$username = $_POST['username'];
						}

						if ($_POST['email'] == '') {
							$email = $_SESSION['email'];
						} else {
							$email = $_POST['email'];
						}

						if ($_POST['phone'] == '') {
							$phone = $_SESSION['phone'];
						} else {
							$phone = $_POST['phone'];
						}

						if ($_POST['birthdate'] == '') {
							$birthdate = $_SESSION['birthdate'];
						} else {
							$birthdate = $_POST['birthdate'];
						}

						if ($_POST['oldPassword'] == '') {
							$password = $_SESSION['password'];
						} elseif ($_POST['oldPassword'] == $_SESSION['password']) {
							if ($_POST['newPassword'] == '' or $_POST['newPasswordRepeat'] == '') {
								echo "<div class='errorLog'>Debe introducir una nueva contraseña.</div>";
								$successVar = 0;
								$password = $_SESSION['password'];
							} elseif ($_POST['newPassword'] == $_POST['newPasswordRepeat']) {
								$password = $_POST['newPassword'];
							} else {
								echo "<div class='errorLog'>Las contraseñas no coinciden.</div>";
								$successVar = 0;
								$password = $_SESSION['password'];
							}
						} else {
							echo "<div class='errorLog'>La antigua contraseña no es correcta.</div>";;
							$successVar = 0;
							$password = $_SESSION['password'];
						}

						if ($name and $surname and $username and $email and $phone and $birthdate and $password) {

							$update_query = "UPDATE users SET name='".$name."', surname='".$surname."', username='".$username."', email='".$email."', phone='".$phone."', birthdate='".$birthdate."', password='".$password."' WHERE username='".$_SESSION['username']."'";
							$update_result = mysqli_query($DBConection, $update_query);

							

						} else {
							echo "ERROR";
							echo $name, $surname, $username, $email, $phone, $birthdate, $password;

						}

						if ($update_query and $successVar == 1) {
								echo "<div class='successLog'>Se han actualizado los datos de su perfil.</div>";
							} else {
								echo "<div class='errorLog'>Los datos de su perfil no han podido actualizarse.</div>";
							}
					}

					if (isset($_POST['backToProfile'])) {
						header("Location: ../HTML/profile.php", TRUE, 301);
						exit();
					}

				?>
			</div>
			
			<footer id="footer-container">
			<div id="footer-logo-container">
				<img src="../images/index/header-logo.png" alt="" id="footer-logo">
			</div>
		</footer>
		</div>
	</div>
</body>
</html>