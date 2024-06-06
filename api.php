<?php
$con = mysqli_connect("localhost", "root", "admin", "repositorio");
$sql_ciclo = "SELECT * FROM ciclos;";
$all_ciclo = mysqli_query($con, $sql_ciclo);

if (isset($_POST["ciclos"])) {
    $ciclo_id = $_POST["ciclos"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<!-- CSS -->
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <!-- RowGrouping -->
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.5.0/css/rowGroup.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.5.0/css/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.5.0/css/rowGroup.bootstrap5.css">
    <!-- Custom -->
    <link rel="stylesheet" href="assets/css/tdstyle.css">

<!-- JS -->
    <!-- JQuery -->
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <!-- RowGrouping -->
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/dataTables.rowGroup.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/rowGroup.dataTables.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/rowGroup.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.5.0/js/rowGroup.bootstrap5.js"></script>
    <!-- Custom -->
    <script src="//cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="./assets/js/tabla3.js"></script>

<title>Proyectos</title>
</head>

<body>
    <br>
    <div class="container">
        <header id="header">
            <a href="index.php">
                <h1>Repositorio de Proyectos</h1>
            </a>
            <h5 style="position: relative; text-align: center">Selecciona un ciclo para ver los proyectos:</h5>
            <div style="position: relative">

                <form action="api.php" method="POST" style="position: absolute;top: 50%;width: 100%;text-align: center">
                    <select name="ciclos" id="ciclos">
                        <?php
                        while ($ciclo_1 = mysqli_fetch_array($all_ciclo, MYSQLI_ASSOC)) :;
                        ?>
                            <option value="" hidden selected="selected"></option>
                            <option value="<?php echo $ciclo_1["Ciclo_Id"];?>">
                                <?php echo $ciclo_1["Ciclo_Nombre"];
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
				    </select>

                    <button type="submit">Select</button>
                </form>
            </div>

        </header>
        <br>
    </div>
 
    <div>
        <?php
        //Almacenamos las credenciales de la db en variables
        $hostname = "localhost";
        $username = "root";
        $password = "admin";
        $dbname = "repositorio";
        //conectamos con la db
        $con = mysqli_connect($hostname, $username, $password, $dbname);
        $sql = "SELECT Titulo, concat(ua.Nombre,' ', ua.Apellido_1,' ', ua.Apellido_2) as 'Nombre Alumno',cic.Ciclo_Siglas as 'Ciclo',p.Memoria_Link 'Memoria',c.Curso_Nombre 'Curso',group_concat(pc.Nombre SEPARATOR ', ') as 'PalabrasClave', 
        concat(ut.Nombre,' ',ut.Apellido_1,' ',ut.Apellido_2) as 'Tutor/a'
        FROM ( repositorio.proyectos p 
        INNER JOIN alumnos ua ON p.Alumno_Id = ua.Alumno_Id
        INNER JOIN tutores ut ON p.Tutor_Id = ut.Tutor_Id
        LEFT JOIN asignacionPalabrasClave ast ON ast.Proyecto_Id=p.Proyecto_Id
        LEFT JOIN PalabrasClave pc ON ast.PalabrasClave_Id=pc.PalabrasClave_Id
        INNER JOIN cursos c ON p.Curso_Id=c.Curso_Id
        INNER JOIN ciclos cic ON p.Ciclo_Id=cic.Ciclo_Id
        ) 
        WHERE cic.Ciclo_id = '$ciclo_id' AND p.Publico=TRUE
        group by p.Proyecto_Id;";

        //pasamos la consulta y almacenamos el resultado como variable
        $resultado = mysqli_query($con, $sql);
        if (mysqli_num_rows($resultado) > 0) {
            echo '<table id="Tabla1" class="table table-striped table-bordered tbl-content" cellspacing="0" style="width:100%;">
       <thead>
        <tr> 
            <th> Detalles </th>
            <th> Nombre del Proyecto </th>
            <th> Alumno </th>  
            <th> Palabras clave </th>
            <th> Curso </th>
            <th> Tutor/a </th> 
        </tr>
        </thead>
        <tbody>';
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo '
            <tr class="group" data-child-name="test1" data-child-value="' . $fila["Memoria"] . '"> 
                <td class="details-control"></td>
                <td>' . $fila["Titulo"] . '</td>
                <td>' . $fila["Nombre Alumno"] . '</td>
                <td>' . $fila["PalabrasClave"] . '</td>
                <td> Curso ' . $fila["Curso"] . '</td>
                <td>' . $fila["Tutor/a"] . '</td> 
            </tr>';
            }
            echo '</tbody>
            <tfoot>
            <tr>
                <th>  </th>
                <th> Nombre del Proyecto </th>
                <th> Alumno </th>
                <th> Palabras Clave </th>
                <th> Curso </th>
                <th> Tutor/a </th>
            </tr>
        </tfoot></table>';
        } else {
            echo "No hay proyectos en la base de datos";
        }
        ?>
    </div>


</body>



</html>
<?php
}else {
    header("Location: index.php");
}
?>