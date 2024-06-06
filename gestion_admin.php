<?php
session_start();
$con = mysqli_connect("localhost", "root", "admin", "repositorio");
$tutor_id = $_SESSION["user_id"];
$sql_alumnos = "SELECT Alumno_Id,concat(Nombre,' ',Apellido_1,' ',Apellido_2) as 'Nombre' FROM `alumnos`";
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
        <title>Panel de control</title>
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

 
    <h1 style="margin:1em 0 0 0">Panel central</h1>
    <div class="d-flex justify-content-center align-items-center">
            <a href="index.php" class="btn btn-primary" style="background-color: #1cb495; border:0;">VOLVER AL INDEX</a>
            </div>
    <br>
    <div class="d-flex justify-content-center align-items-center">
        <table class="p-5 rounded shadow" style="width: 30em" action="insert.php" method="post">
            <br>
            <tr>
                <th></th>
                <th></th>
                <th style="text-align:center;">Alumnos</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td> </td>
                <td><a href="add_alumno.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Añadir Alumnos</a></td>
                <td style="text-align:center;"></td>
                <td><a href="mod_alumno.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Modificar Alumnos</a></td>
                <td> </td>
            </tr>
            <tr>
                <th></th> 
                <th></th>
                <th style="text-align:center;">Cursos</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td> </td>
                <td><a href="add_curso.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Añadir Cursos</a></td>
                <td style="text-align:center;"></td>
                <td><a href="mod_curso.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Modificar Cursos</a></td>
                <td> </td>
            </tr>
            <tr>
                <th></th> 
                <th></th>
                <th style="text-align:center;">Ciclos</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td> </td>
                <td><a href="add_ciclo.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Añadir Ciclo</a></td>
                <td style="text-align:center;"></td>
                <td><a href="mod_ciclo.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Modificar Ciclo</a></td>
                <td> </td>
            </tr>    
            <tr>
                <th></th> 
                <th></th>
                <th style="text-align:center;">Palabras Clave</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td> </td>
                <td><a href="add_pclave.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Añadir Palabras Clave</a></td>
                <td style="text-align:center;"></td>
                <td><a href="mod_pclave.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Modificar Palabras Clave</a></td>
                <td> </td>
            </tr>  
            <tr>
                <th></th> 
                <th></th>
                <th style="text-align:center;">Proyectos</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td> </td>
                <td><a href="add_proyecto.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Añadir Proyecto</a></td>
                <td style="text-align:center;"></td>
                <td><a href="mod_proyecto.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Modificar Proyecto</a></td>
                <td> </td>
            </tr>       
            <tr>
                <th></th> 
                <th></th>
                <th style="text-align:center;">Tutores</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td> </td>
                <td><a href="add_tutor.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Añadir Tutor</a></td>
                <td style="text-align:center;"></td>
                <td><a href="mod_tutor.php" class="btn btn-primary" style="background-color: #1cb495; width:100%; border:0;">Modificar Tutor</a></td>
                <td> </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="d-flex justify-content-center align-items-center">
        <a href="logout.php" class="btn btn-primary" style="background-color: #1cb495; border:0;">LOGOUT</a>
    </div>

    
    </body>

<?php
} else {
    header("Location: index.php");
}
?>