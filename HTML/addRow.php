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

		$UserDBConection->character_set_name();
		
		if (!$UserDBConection->set_charset('utf8')) {
    		printf("Error cargando el conjunto de caracteres utf8: %s\n", $UserDBConection->error);
    		exit;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Brais Cuns Varela (MurkyCuns)">
	<meta name="description" content="Murky Studios Database">
	<link rel="stylesheet" href="../CSS/addRow-styles.css">
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

				if (isset($_POST['newData'])) {
					echo "<form action='../HTML/addRow.php' method='POST' id='newDataForm'>";

					mysqli_select_db($UserDBConection, $UserDBName);
					$select_query = "SELECT * FROM ". $_SESSION['tableRow'];
					$tableNames_query = "

						SELECT column_name
						FROM information_schema.columns
						WHERE  table_name = '".$_SESSION['tableRow']."'
						AND table_schema = '".$UserDBName."'"

					;

					$select_result = mysqli_query($UserDBConection, $select_query);

					$tableNames_result = mysqli_query($UserDBConection, $tableNames_query);

					if ($tableNames_result) {
						echo "<table id='newDataTable'>";
						echo "<tr class='column-row'>";
						$firstElement = TRUE;
						while ($columnArray = mysqli_fetch_assoc($tableNames_result)) {
			    			foreach ($columnArray as $columnName) {
			    				if ($firstElement) {
			    				 	$firstElement = FALSE;
			    				} else {
			    					echo "<th class='column-field'>".$columnName."</th>";
			    				}
			    							  
			    			}
			    		}
			    		echo "</tr>";

			    		$countColumns_query = "

						SELECT count(*)
						FROM information_schema.columns
						WHERE  table_name = '".$_SESSION['tableRow']."'
						AND table_schema = '".$UserDBName."'"

						;

						

			    		for ($i=0; $i < 1; $i++) { 
			    			echo "<tr>";
			    			$countColumns_result = mysqli_query($UserDBConection, $countColumns_query);
							$fila = $countColumns_result->fetch_row();
                			
			    			for ($j=1; $j < $fila[0]; $j++) {
			    				echo "<td><input type='text' name='newData".$j."' class='newDataInput'></td>";
			    			}
			    			echo "</tr>";
			    		}
			    				
			    		echo "</table>";
					} else {
						printf("Error: %s\n", mysqli_error($UserDBConection));
					}
					echo "<input type='submit' name='sendNewData' value='Introducir Datos' class='button'>";
					echo "<br><br>";
					echo "<input type='submit' name='backToTables' value='Volver atrás' class='button'>";
					echo "</form>";

					}

					if (isset($_POST['sendNewData'])) {

						$countColumns_query = "

						SELECT count(*)
						FROM information_schema.columns
						WHERE  table_name = '".$_SESSION['tableRow']."'
						AND table_schema = '".$UserDBName."'"

						;

			    		$countColumns_result = mysqli_query($UserDBConection, $countColumns_query);
						$fila = $countColumns_result->fetch_row();

						$newDataArray = '';

			    		for ($j=0; $j < $fila[0]; $j++) {
			    			echo $_POST['newData'.$j];
			    			$newDataArray .= "('{$_POST['newData'.$j]}'),";

						}

						$newDataArray = rtrim($newDataArray, ',');

						if ($newDataArray) {
							mysqli_select_db($UserDBConection, $UserDBName);
							$insert_query = "INSERT INTO " .$_SESSION['tableRow']. " VALUES (" .$newDataArray. ");";
							$insert_result = mysqli_query($UserDBConection, $insert_query);

							if ($insert_result) {
								header("Location: ../HTML/showTables.php", TRUE, 301);
								exit();

							} else {
								printf("Error: %s\n", mysqli_error($UserDBConection));
							}
						} else {
							echo "non existe array";
						}

					}

					if (isset($_POST['backToTables'])) {
						header("Location: ../HTML/showTables.php", TRUE, 301);
						exit();
					}

				?>
		</div>
		<footer id="footer-container"
		>
			<div id="footer-logo-container">
				<img src="../images/index/header-logo.png" alt="" id="footer-logo">
			</div>
		</footer>
	</div>
</body>
</html>