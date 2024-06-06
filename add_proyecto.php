<?php
session_start();
$con = mysqli_connect("localhost", "root", "admin", "repositorio");
$tutor_id = $_SESSION["user_id"];
$sql_alumnos = "SELECT Alumno_Id,concat(Nombre,' ',Apellido_1,' ',Apellido_2) as 'Nombre' FROM `alumnos` order by `Nombre` asc";
$all_alumnos = mysqli_query($con, $sql_alumnos);
$sql_ciclo = "SELECT * FROM ciclos;";
$all_ciclo = mysqli_query($con, $sql_ciclo);
$sql_cursos = "SELECT * FROM repositorio.cursos order by Curso_Nombre desc;";
$all_cursos = mysqli_query($con, $sql_cursos);
if (isset($_SESSION['user_id'])) {
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Insertar TFG</title>
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


    <body>

 
    <h1 style="margin:1em 0 0 0">Añadir proyecto</h1>


        </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="gestion_admin.php" class="btn btn-primary" style="background-color: #1cb495; border:0;">VOLVER</a>
        </div>
    <br>

    <div class="d-flex justify-content-center align-items-center">
        <form class="p-5 rounded shadow" style="width: 30em" action="insert_proyecto.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
	  		<div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error'])?>
			</div>
	    <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
	  		<div class="alert alert-success" role="alert">
			  <?=htmlspecialchars($_GET['success'])?>
			</div>
	    <?php } ?>
            <div class="form-group">
                <label for="INS_Alumno_Id">Alumno</label>
                <select name="INS_Alumno_Id" id="INS_Alumno_Id" placeholder="Alumno" required>
                    <?php
                    while ($alumno = mysqli_fetch_array($all_alumnos, MYSQLI_ASSOC)) :;
                    ?>
                        <option value="<?php echo $alumno["Alumno_Id"];?>">
                            <?php echo $alumno["Nombre"];
                            ?>
                        </option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="INS_Ciclo_Id">Ciclo</label>
                <select name="INS_Ciclo_Id" id="INS_Ciclo_Id" placeholder="Ciclo" required>
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
            </div>


            <div class="form-group">
                <label for="INS_Titulo">Titulo</label>
                <input name="INS_Titulo" type="text" id="INS_Titulo" placeholder="Titulo del proyecto" required>
            </div>


            <div class="form-group">
                <label for="INS_Memoria_Link">Memoria</label>
                <input name="INS_Memoria_Link" type="text" id="INS_Memoria_Link" placeholder="Link a la memoria">
            </div>

            <div class="form-group">
                <label for="INS_Cursos_Id">Curso</label>
                <select name="INS_Cursos_Id" id="INS_Cursos_Id" placeholder="Curso" required>
                    <?php
                    while ($cursos = mysqli_fetch_array($all_cursos, MYSQLI_ASSOC)) :;
                    ?>
                        <option value="<?php echo $cursos["Curso_Id"];?>">
                            <?php echo $cursos["Curso_Nombre"];
                            ?>
                        </option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <br>
                
                <input id="publico" name="publico" type="checkbox" value="true" checked>
                <label for="publico"> Publico</label>
                <input id="publico" name="publico" type="checkbox" value="false" hidden>
            </div>
            <button type="submit" value="submit_proyecto"class="btn btn-primary">Añadir</button>
        </form>
    </div>


    
    </body>

<?php
} else {
    header("Location: index.php");
}
?>