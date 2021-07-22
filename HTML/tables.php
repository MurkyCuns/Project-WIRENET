<?php

	session_start();


?>

<?php 

	if (isset($_SESSION['username'])) {

		$UserDBHost = "localhost";
		$UserDBUsername = $_SESSION['username'];
		$UserDBPassword = $_SESSION['password'];
		$UserDBName = $_SESSION['username'] . "DB";

		$UserDBConection = mysqli_connect($UserDBHost, $UserDBUsername, $UserDBPassword);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Brais Cuns Varela (MurkyCuns)">
	<meta name="description" content="Murky Studios Database">
	<link rel="stylesheet" href="../CSS/tables-styles.css">
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
						<li class="nav-menu-item"><a class="current" class="nav-menu-item" href="../HTML/index.php">Tablas Actuales</a></li>
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/addTable.php">Añadir Tabla</a></li>
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

			<?php 

				$select_query = "SHOW TABLES FROM " .$UserDBName;
				$select_result = mysqli_query($UserDBConection, $select_query);
				echo "<div id='new-table-option-container'>";
					while ($fila = mysqli_fetch_row($select_result)) {
	    				for ($i=0; $i < count($fila); $i++) { 
	    					echo "<a href='../HTML/addTable.php' class='table-option-quote'>".ucfirst($fila[$i])."</a>";
	    					echo "<br>";
	    				}
					}
				echo "</div>"

				// SIGUE AQUÍ, HAY ALGUN PROBLEMA CA CONSULTA. SOLO QUERO NOMBRES DE TABLAS MEU.
				// AHORA PONTE A XOGAR A ALGO OU PETACHE A PUTA CABEZA
				// PD: ACORDATE DE TRATALO COMO UN ARRAY SECUENCIAL OU MATOCHE, E CONTROLA A OPTIMIZACIÓN OU MATOCHE TAM

			?>

			<div id="new-table-option-container-2">
				<a href="../HTML/addTable.php" class="table-option-quote">Añadir nueva</a>
				<br>
			</div>
		</div>
	</div>
</body>