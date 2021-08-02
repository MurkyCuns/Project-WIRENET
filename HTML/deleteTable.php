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
	<link rel="stylesheet" href="../CSS/deleteTable-styles.css">
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
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/addTable.php">Añadir Tabla</a></li>
						<li class="nav-menu-item"><a class="current" class="nav-menu-item" href="../HTML/deleteTable.php">Eliminar Tabla</a></li>
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

					if (!isset($_SESSION['display'])) {
						$_SESSION['display'] = 1;
					}				

					if ($_SESSION['display'] == 1) {
						echo "<div class='form-input-quote'>Selecciona una tabla para ser eliminada:</div>
							<br>";
					 	$select_query = "SHOW TABLES FROM " .$UserDBName;
						$select_result = mysqli_query($UserDBConection, $select_query);
						echo "<form action='deleteTable.php' method='POST'>";
						echo "<div id='new-table-option-container'>";
						while ($fila = mysqli_fetch_row($select_result)) {
			    			for ($i=0; $i < count($fila); $i++) {
			    				echo "<input type='submit' class='table-option-quote' name='".$fila[$i]."' value='".ucfirst($fila[$i])."'>";
			    				echo "<br>";

			    				if (isset($_POST[$fila[$i]])) {
			    					$_SESSION['tableRow'] = $_POST[$fila[$i]];

			    					$_SESSION['display'] = 0;
			    					header("Location: ../HTML/deleteTable.php", TRUE, 301);
									exit();
			    				}
			    			}
			    					
			    		}
					} else {
						echo "<form action='deleteTable.php' method='POST'>";
						echo "<div id='confirmContainer'>Estás seguro de querer eliminar la tabla: <span class='confirmTable'>".$_SESSION['tableRow']."</span>?</div>";
						echo "<div id='confirmButtonContainer'>";
							echo "<input type='submit' class='confirmButton' name='confirmButton' value='Si'>";
							echo "<input type='submit' class='denyButton' name='denyButton' value='No'>";
						echo "</div>";
						echo "</form>";

						if (isset($_POST['confirmButton'])) {
							mysqli_select_db($UserDBConection, $UserDBName);
					 		$drop_query = "DROP TABLE ".$_SESSION['tableRow'];
					 		$drop_result = mysqli_query($UserDBConection, $drop_query) or die(mysqli_error($UserDBConection));
					 		if ($drop_result) {
					 			$_SESSION['display'] = 1;
					 			header("Location: ../HTML/tables.php", TRUE, 301);
								exit();
					 		}
						}

						if (isset($_POST['denyButton'])) {
							$_SESSION['display'] = 1;
					 		header("Location: ../HTML/tables.php", TRUE, 301);
							exit();
						} 	
					}



					

				?>

		</div>
	</div>
</body>
</html>