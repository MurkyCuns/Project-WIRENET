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
	<link rel="stylesheet" href="../CSS/addTable-styles.css">
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
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/index.php">Tablas Actuales</a></li>
						<li class="nav-menu-item"><a class="current" class="nav-menu-item" href="../HTML/addTable.php">Añadir Tabla</a></li>
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/contact.php">Eliminar Tabla</a></li>
					</ul>
				</nav>
			</div>
			<div id="session-container">
				<?php 
					if ($_SESSION['username']) {
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
		<div id="main-container">
			<form action="../HTML/addTable.php" method="POST" id="main-form-container">
				<span class="form-input-quote">Número Columnas</span>
				<br>
				<input type="text" name="tableColNum" class="form-input-col">
				<input type="submit" name="send-cols-button" value="Enviar columnas" id="send-cols-button">

				<?php 

				if (isset($_POST['send-cols-button'])) {
					$contadorCols = $_POST['tableColNum'];
					echo "
						<div class='hr-container'>
							<hr class='delimiter'>
						</div>

						<span class='form-input-quote'>Nombre</span>
						<br>
						<input type='text' name='tableTitle' class='form-input'>
						<br>
						<span class='form-input-quote'>Identificador</span>
						<br>
						<input type='text' name='tableID' class='form-input'>
						<br>
						";
					for ($i=1; $i <= $contadorCols ; $i++) { 
						echo "
							<span class='form-input-quote'>Columna Nº " . $i . "</span>
							<br>
							<input type='text' name='tableCol" . $i . "' class='form-input'>
							<br>
							";
					}

					echo "
						<div class='hr-container'>
							<hr class='delimiter'>
						</div>
						<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
						";
				}

				?>
			</form>
			<footer id="footer-container">
				<div id="footer-logo-container">
					<img src="../images/index/header-logo.png" alt="" id="footer-logo">
				</div>
			</footer>
		</div>
	</div>
</body>