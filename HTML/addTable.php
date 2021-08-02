<?php

	session_start();

	if ($_SESSION) {
		$DBHost = "localhost";
		$DBUsername = $_SESSION['username'];
		$DBPassword = $_SESSION['password'];
		$DBName = $_SESSION['UserDBName'];

		$DBConection = mysqli_connect($DBHost, $DBUsername, $DBPassword, $DBName);
	}

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
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/deleteTable.php">Eliminar Tabla</a></li>
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
				<span class="form-input-quote">Número de Columnas</span>
				<br>
				<input type="text" name="tableColNum" class="form-input-col" placeholder="1 - 10">
				<input type="submit" name="send-cols-button" value="Guardar columnas" id="send-cols-button">
			</form>

				<?php 

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 1) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 2) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 3) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 3</span>
								<br>
								<input type='text' name='tableCol3' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 4) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 3</span>
								<br>
								<input type='text' name='tableCol3' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 4</span>
								<br>
								<input type='text' name='tableCol4' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 5) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 3</span>
								<br>
								<input type='text' name='tableCol3' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 4</span>
								<br>
								<input type='text' name='tableCol4' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 5</span>
								<br>
								<input type='text' name='tableCol5' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 6) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 3</span>
								<br>
								<input type='text' name='tableCol3' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 4</span>
								<br>
								<input type='text' name='tableCol4' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 5</span>
								<br>
								<input type='text' name='tableCol5' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 6</span>
								<br>
								<input type='text' name='tableCol6' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 7) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 3</span>
								<br>
								<input type='text' name='tableCol3' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 4</span>
								<br>
								<input type='text' name='tableCol4' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 5</span>
								<br>
								<input type='text' name='tableCol5' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 6</span>
								<br>
								<input type='text' name='tableCol6' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 7</span>
								<br>
								<input type='text' name='tableCol7' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 8) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 3</span>
								<br>
								<input type='text' name='tableCol3' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 4</span>
								<br>
								<input type='text' name='tableCol4' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 5</span>
								<br>
								<input type='text' name='tableCol5' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 6</span>
								<br>
								<input type='text' name='tableCol6' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 7</span>
								<br>
								<input type='text' name='tableCol7' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 8</span>
								<br>
								<input type='text' name='tableCol8' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 9) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 3</span>
								<br>
								<input type='text' name='tableCol3' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 4</span>
								<br>
								<input type='text' name='tableCol4' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 5</span>
								<br>
								<input type='text' name='tableCol5' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 6</span>
								<br>
								<input type='text' name='tableCol6' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 7</span>
								<br>
								<input type='text' name='tableCol7' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 8</span>
								<br>
								<input type='text' name='tableCol8' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 9</span>
								<br>
								<input type='text' name='tableCol9' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}

					if (isset($_POST['send-cols-button'])) {
						$contadorCols = $_POST['tableColNum'];

						if ($contadorCols == 10) {
							echo "
							<form action='../HTML/addTable.php' method='POST' id='main-form-container'>
								<div class='hr-container'>
									<hr class='delimiter'>
								</div>

								<span class='form-input-quote'>Nombre</span>
								<br>
								<input type='text' name='tableTitle' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Identificador</span>
								<br>
								<input type='text' name='tableID' class='form-input' placeholder='...'>
								<br>

								<span class='form-input-quote'>Columna Nº 1</span>
								<br>
								<input type='text' name='tableCol1' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 2</span>
								<br>
								<input type='text' name='tableCol2' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 3</span>
								<br>
								<input type='text' name='tableCol3' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 4</span>
								<br>
								<input type='text' name='tableCol4' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 5</span>
								<br>
								<input type='text' name='tableCol5' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 6</span>
								<br>
								<input type='text' name='tableCol6' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 7</span>
								<br>
								<input type='text' name='tableCol7' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 8</span>
								<br>
								<input type='text' name='tableCol8' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 9</span>
								<br>
								<input type='text' name='tableCol9' class='form-input' placeholder='...'>
								<br>
								<span class='form-input-quote'>Columna Nº 10</span>
								<br>
								<input type='text' name='tableCol10' class='form-input' placeholder='...'>
								<br>

								";

						echo "
							<div class='hr-container'>
								<hr class='delimiter'>
							</div>
							<input type='submit' name='send-info-button-2' value='Crear tabla' id='send-info-button'>
							";

						echo "</form>";
						}

					}


					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 3) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
						}
	  
					}

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 4) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
									 
						}
	  
					}

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 5) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];
							$tableCol3 = $_POST['tableCol3'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255),
									$tableCol3 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
									 
						}
	  
					}

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 6) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];
							$tableCol3 = $_POST['tableCol3'];
							$tableCol4 = $_POST['tableCol4'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255),
									$tableCol3 varchar(255),
									$tableCol4 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
									 
						}
	  
					}

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 7) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];
							$tableCol3 = $_POST['tableCol3'];
							$tableCol4 = $_POST['tableCol4'];
							$tableCol5 = $_POST['tableCol5'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255),
									$tableCol3 varchar(255),
									$tableCol4 varchar(255),
									$tableCol5 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
									 
						}
	  
					}

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 8) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];
							$tableCol3 = $_POST['tableCol3'];
							$tableCol4 = $_POST['tableCol4'];
							$tableCol5 = $_POST['tableCol5'];
							$tableCol6 = $_POST['tableCol6'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255),
									$tableCol3 varchar(255),
									$tableCol4 varchar(255),
									$tableCol5 varchar(255),
									$tableCol6 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
									 
						}
	  
					}

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 9) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];
							$tableCol3 = $_POST['tableCol3'];
							$tableCol4 = $_POST['tableCol4'];
							$tableCol5 = $_POST['tableCol5'];
							$tableCol6 = $_POST['tableCol6'];
							$tableCol7 = $_POST['tableCol7'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255),
									$tableCol3 varchar(255),
									$tableCol4 varchar(255),
									$tableCol5 varchar(255),
									$tableCol6 varchar(255),
									$tableCol7 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
									 
						}
	  
					}

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 10) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];
							$tableCol3 = $_POST['tableCol3'];
							$tableCol4 = $_POST['tableCol4'];
							$tableCol5 = $_POST['tableCol5'];
							$tableCol6 = $_POST['tableCol6'];
							$tableCol7 = $_POST['tableCol7'];
							$tableCol8 = $_POST['tableCol8'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255),
									$tableCol3 varchar(255),
									$tableCol4 varchar(255),
									$tableCol5 varchar(255),
									$tableCol6 varchar(255),
									$tableCol7 varchar(255),
									$tableCol8 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
									 
						}
	  
					}

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 11) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];
							$tableCol3 = $_POST['tableCol3'];
							$tableCol4 = $_POST['tableCol4'];
							$tableCol5 = $_POST['tableCol5'];
							$tableCol6 = $_POST['tableCol6'];
							$tableCol7 = $_POST['tableCol7'];
							$tableCol8 = $_POST['tableCol8'];
							$tableCol9 = $_POST['tableCol9'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255),
									$tableCol3 varchar(255),
									$tableCol4 varchar(255),
									$tableCol5 varchar(255),
									$tableCol6 varchar(255),
									$tableCol7 varchar(255),
									$tableCol8 varchar(255),
									$tableCol9 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
							}
									 
						}
	  
					

					if (isset($_POST['send-info-button-2'])) {
						$contadorPOST = count($_POST)-1;
							
						if ($contadorPOST == 12) {
							$tableTitle = $_POST['tableTitle'];
							$tableID = $_POST['tableID'];
							$tableCol1 = $_POST['tableCol1'];
							$tableCol2 = $_POST['tableCol2'];
							$tableCol3 = $_POST['tableCol3'];
							$tableCol4 = $_POST['tableCol4'];
							$tableCol5 = $_POST['tableCol5'];
							$tableCol6 = $_POST['tableCol6'];
							$tableCol7 = $_POST['tableCol7'];
							$tableCol8 = $_POST['tableCol8'];
							$tableCol9 = $_POST['tableCol9'];
							$tableCol10 = $_POST['tableCol10'];

							$resultado = mysqli_query($DBConection, "CREATE TABLE `{$tableTitle}`(
									$tableID varchar(255),
									$tableCol1 varchar(255),
									$tableCol2 varchar(255),
									$tableCol3 varchar(255),
									$tableCol4 varchar(255),
									$tableCol5 varchar(255),
									$tableCol6 varchar(255),
									$tableCol7 varchar(255),
									$tableCol8 varchar(255),
									$tableCol9 varchar(255),
									$tableCol10 varchar(255)
									)");

							if ($resultado) {
								echo "
									<div id='result-container'>
									<p class='result-alert'>La tabla ".$tableTitle." ha sido creada correctamente!</p>
									</div>";
							} else {
								echo "
									<div id='result-container'>
									<p class='bad-result-alert'>La tabla ".$tableTitle." no ha podido crearse correctamente. Compruebe que la tabla no exista previamente y que haya introducido todos los campos.</p>
									</div>";
							}
									 
						}
	  
					}
					        


				?>

			<footer id="footer-container">
				<div id="footer-logo-container">
					<img src="../images/index/header-logo.png" alt="" id="footer-logo">
				</div>
			</footer>
		</div>
	</div>
</body>