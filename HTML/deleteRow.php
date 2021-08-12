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
	<link rel="stylesheet" href="../CSS/deleteRow-styles.css">
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
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/addRow.php">Añadir Fila</a></li>
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/deleteRow.php">Eliminar Fila</a></li>
						<li class="nav-menu-item"><a class="nav-menu-item" href="../HTML/modifyRow.php">Modificar Fila</a></li>
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

				

			?>

			<?php



				// $_SESSION['deleteRowDisplay'] = 1;

				if (!isset($_SESSION['deleteRowDisplay'])) {
					$_SESSION['deleteRowDisplay'] = 1;
				}

				if ($_SESSION['deleteRowDisplay'] == 1) {
					echo "<form action='deleteRow.php' method='POST'>";

					if ($tableNames_result) {
						echo "<div id='tableName-container'>".$_SESSION['tableRow']."</div>";
						echo "<table id='main-table'>";
						echo "<tr class='column-row'>";
						while ($columnArray = mysqli_fetch_assoc($tableNames_result)) {
		    				foreach ($columnArray as $columnName) { 
		    					echo "<th class='column-field'>".$columnName."</th>";
		    							  
		    				}
		    			}
		    			echo "</tr>";
		    				while ($rowArray = mysqli_fetch_assoc($select_result)) {
		    					echo "<tr class='row-row'>";
		    					foreach ($rowArray as $rowValue) {
		    						echo "<td class='row-field'>".$rowValue."</td>";
		    					}
		    					echo "</tr>";

		    				}
		    				
		    			echo "</table>";

		    			echo "</form>";
					} else {
						printf("Error: %s\n", mysqli_error($UserDBConection));
					}
				}

				$tableNames_query = "

					SELECT column_name
					FROM information_schema.columns
					WHERE  table_name = '".$_SESSION['tableRow']."'
					AND table_schema = '".$UserDBName."'"

				;

				$select_result = mysqli_query($UserDBConection, $select_query);

				$tableNames_result = mysqli_query($UserDBConection, $tableNames_query);

				$tableNames_array = mysqli_fetch_array($tableNames_result);

				if ($_SESSION['deleteRowDisplay'] == 1) {
					echo "<form action='../HTML/deleteRow.php' method='POST' id='main-form-container'>
							<div class='form-input-quote'>Indique el <span class='tableID'>".$tableNames_array[0]."</span> de la fila a eliminar:</div>
							<br>
							<input type='text' name='tableID' class='form-input-col' placeholder='Número de fila'>
							<input type='submit' name='send-id-button' value='Seleccionar fila' id='send-cols-button'>
						</form>";

				}

				if (isset($_POST['send-id-button'])) {
					echo $_POST['send-id-button'];
					$_SESSION['tableID'] = $_POST['tableID'];
					$_SESSION['deleteRowDisplay'] = 2;
					header("Location: ../HTML/deleteRow.php", TRUE, 301);
					exit();

				}

				if ($_SESSION['deleteRowDisplay'] == 2) {
						echo "<div class='confirmQuote'>La fila con ".lcfirst($tableNames_array[0]).": <span class='rowNumber'>".$_SESSION['tableID']."</span> contiene los siguientes campos:</div>";

						$select_query = "SELECT * FROM ".$_SESSION['tableRow']." WHERE ".$tableNames_array[0]."='".$_SESSION['tableID']."';";
						$select_result = mysqli_query($UserDBConection, $select_query);

						$tableNames_query = "

							SELECT column_name
							FROM information_schema.columns
							WHERE  table_name = '".$_SESSION['tableRow']."'
							AND table_schema = '".$UserDBName."'"

						;

						$tableNames_result = mysqli_query($UserDBConection, $tableNames_query);



						echo "<table id='main-table'>";
						echo "<tr class='column-row'>";
						while ($columnArray = mysqli_fetch_assoc($tableNames_result)) {
	    					foreach ($columnArray as $columnName) { 
	    						echo "<th class='selected-column-field'>".$columnName."</th>";
	    							  
	    					}
	    				}
	    				echo "</tr>";

						while ($selectedRowArray = mysqli_fetch_assoc($select_result)) {
	    					echo "<tr class='row-row'>";
	    					foreach ($selectedRowArray as $rowValue) {
	    						echo "<td class='selected-row-field'>".$rowValue."</td>";
	    					}
	    					echo "</tr>";

	    				}

	    				echo "</table>";

	    				echo "<div class='confirmQuote'>Estás seguro de querer eliminarla?</div>";

						echo "<form action='deleteRow.php' method='POST'>";

						echo "<div id='confirmButtonContainer'>";
							echo "<input type='submit' class='confirmButton' name='confirmButton' value='Si'>";
							echo "<input type='submit' class='denyButton' name='denyButton' value='No'>";
						echo "</div>";
						echo "</form>";

						if (isset($_POST['confirmButton'])) {
							mysqli_select_db($UserDBConection, $UserDBName);
							$delete_query = "DELETE FROM " .$_SESSION['tableRow']." WHERE ".$tableNames_array[0]."='".$_SESSION['tableID']."';";
							$delete_result = mysqli_query($UserDBConection, $delete_query);

							

							$_SESSION['deleteRowDisplay'] = 1;
							header("Location: ../HTML/deleteRow.php", TRUE, 301);
							exit();
						}

						if (isset($_POST['denyButton'])) {
							$_SESSION['deleteRowDisplay'] = 1;
							header("Location: ../HTML/deleteRow.php", TRUE, 301);
							exit();	
						}
					}

				if (isset($_POST['backTables'])) {
					header("Location: ../HTML/tables.php", TRUE, 301);
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