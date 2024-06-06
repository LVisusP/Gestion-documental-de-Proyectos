<?php
session_start();
$con = mysqli_connect("localhost", "root", "admin", "repositorio");
$sql_alumnos = "SELECT Alumno_Id,concat(Nombre,' ',Apellido_1,' ',Apellido_2) as 'Nombre' FROM `alumnos`";
$all_alumnos = mysqli_query($con, $sql_alumnos);
if (isset( $_POST['Alumno_Busqueda']
)) {
    $alumno_busqueda = $_POST['Alumno_Busqueda'];
    $sql_alumno_busqueda = "SELECT Alumno_Id, Nombre, Apellido_1, Apellido_2 FROM `alumnos` WHERE Alumno_Id = $alumno_busqueda";
    $all_alumno_busqueda = mysqli_query($con, $sql_alumno_busqueda);
}

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

 
    <h1 style="margin:1em 0 0 0">Modificar Alumno</h1>

    <div class="d-flex justify-content-center align-items-center">
            <a href="gestion_admin.php" class="btn btn-primary" style="background-color: #1cb495; border:0;">VOLVER</a>
            </div>
    <br>
    <div class="d-flex justify-content-center align-items-center">
           
        <form class="p-5 rounded shadow" style="width: 30em" method="POST">

<!-- -->

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

<!-- -->

            <div class="form-group">
                <label for="INS_Alumno_Nombre">Nombre</label>
                <select name="Alumno_Busqueda" id="Alumno_Busqueda">
                        <?php
                        while ($alumnos = mysqli_fetch_array($all_alumnos, MYSQLI_ASSOC)) :;
                        ?>
                            <option value="" hidden selected="selected"></option>
                            <option value="<?php echo $alumnos["Alumno_Id"];?>">
                                <?php echo $alumnos["Nombre"];
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
				</select>
            </div>
            <button name="Buscar" type="submit" value="Buscar" class="btn btn-primary">Buscar</button>
              
            
            <input value="<?php echo $alumno_busqueda ?>" hidden name="Alumno_Busqueda_Id" id="Alumno_Busqueda_Id">
            <?php 
                if (isset( $_POST['Alumno_Busqueda']
                )) {
                    ?>

                    <div class="form-group">
                        <label for="MOD_Alumno_Nombre">Nombre</label>
                        
                        <input name="Alumno_Busqueda_Nombre" required type="text" id="Alumno_Busqueda_Nombre"
                        <?php
                        while ($alumno_busqueda_1 = mysqli_fetch_array($all_alumno_busqueda, MYSQLI_ASSOC)) :;
                        ?>
                            value="<?php echo $alumno_busqueda_1["Nombre"];?>">

                       
                    </div>

                    <div class="form-group">
                        <label for="MOD_Alumno_Apellido_1">Primer Apellido</label>
                        
                        <input name="Alumno_Busqueda_Apellido_1" required type="text" id="Alumno_Busqueda_Nombre"
                            value="<?php echo $alumno_busqueda_1["Apellido_1"];?>">

                       
                    </div>

                    <div class="form-group">
                        <label for="MOD_Alumno_Apellido_2">Segundo Apellido</label>
                        <input name="Alumno_Busqueda_Apellido_2" type="text" id="Alumno_Busqueda_Apellido_2"           
                            value="<?php echo $alumno_busqueda_1["Apellido_2"];?>">



                        <?php
                        endwhile;
                        ?>
                    </div>
            

                <br>
                <button name="mod_alumno" type="submit" value="mod_alumno" formaction="update_alumno.php" class="btn btn-primary">Modificar Alumno</button>
                <?php
                    }
            ?>
            <!--   -->
        </form>
    </div>


    
    </body>

<?php
} else {
    header("Location: index.php");
}
?>