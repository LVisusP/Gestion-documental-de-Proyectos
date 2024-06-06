<?php

$con = mysqli_connect("localhost", "root", "admin", "repositorio");
$sql_ciclo = "SELECT Ciclo_Id, Ciclo_Siglas, Ciclo_Nombre FROM ciclos;";
$all_ciclo = mysqli_query($con, $sql_ciclo);

?>

<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Eventually by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<!-- JQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.5.0/css/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.5.0/css/rowGroup.bootstrap5.css">

    <link rel="stylesheet" href="assets/css/tdstyle.css">

    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/dataTables.rowGroup.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/rowGroup.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/rowGroup.bootstrap5.js"></script>

    <script src="//cdn.datatables.net/2.0.7/js/dataTables.js"></script>
	<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body >

		<!-- Header -->
			<header id="header">
				<h1>Repositorio de Proyectos</h1>
				<p>Selecciona una titulación para acceder<br />
				a los proyectos de la misma:</p>
			</header>

		<!-- Signup Form -->
			<form action="api.php" method="POST"> 
				<select name="ciclos" id="ciclos">
                    <?php
                    while ($ciclo = mysqli_fetch_array($all_ciclo, MYSQLI_ASSOC)) :;
                    ?>
                        <option value="<?php echo $ciclo["Ciclo_Id"];?>">
                            <?php echo $ciclo["Ciclo_Nombre"];
                            ?>
                        </option>
                    <?php
                    endwhile;
                    ?>
				</select>
			<br>
				<button type="submit">Buscar</button>
			</form>
	
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="login.php" class="fa-solid user"><span class="label">INICIA SESIÓN</span></a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/main.js"></script>

	</body>
</html>
