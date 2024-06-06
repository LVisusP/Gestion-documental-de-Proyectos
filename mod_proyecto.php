<?php
session_start();
$con = mysqli_connect("localhost", "root", "admin", "repositorio");
$sql_cursos = "SELECT * FROM repositorio.cursos order by Curso_Nombre desc";
$all_cursos = mysqli_query($con, $sql_cursos);
$sql_alumnos = "SELECT Alumno_Id,concat(Nombre,' ',Apellido_1,' ',Apellido_2) as 'Nombre Alumno' FROM `alumnos`";
$all_alumnos = mysqli_query($con, $sql_alumnos);
$sql_tutores = "SELECT Tutor_Id,concat(Nombre,' ',Apellido_1,' ',Apellido_2) as 'Nombre Tutor' FROM `tutores`";
$all_tutores = mysqli_query($con, $sql_tutores);
$sql_ciclos = "SELECT * FROM repositorio.ciclos";
$all_ciclos = mysqli_query($con, $sql_ciclos);
$sql_cursos = "SELECT * FROM repositorio.cursos order by Curso_Nombre desc";
$all_cursos = mysqli_query($con, $sql_cursos);
$sql_proyectos = "SELECT p.Proyecto_Id, Titulo, concat(ua.Nombre,' ', ua.Apellido_1,' ', ua.Apellido_2) as 'Nombre Alumno',cic.Ciclo_Siglas as 'Ciclo',p.Memoria_Link 'Memoria',c.Curso_Id ,c.Curso_Nombre 'Curso',group_concat(pc.Nombre SEPARATOR ', ') as 'PalabrasClave', 
concat(ut.Nombre,' ',ut.Apellido_1,' ',ut.Apellido_2) as 'Tutor/a', ut.Tutor_Id
FROM ( repositorio.proyectos p 
INNER JOIN alumnos ua ON p.Alumno_Id = ua.Alumno_Id
INNER JOIN tutores ut ON p.Tutor_Id = ut.Tutor_Id
LEFT JOIN asignacionPalabrasClave ast ON ast.Proyecto_Id=p.Proyecto_Id
LEFT JOIN PalabrasClave pc ON ast.PalabrasClave_Id=pc.PalabrasClave_Id
INNER JOIN cursos c ON p.Curso_Id=c.Curso_Id
INNER JOIN ciclos cic ON p.Ciclo_Id=cic.Ciclo_Id
) 
WHERE p.Publico=TRUE
group by p.Proyecto_Id;";
$all_proyectos = mysqli_query($con, $sql_proyectos);
if (isset( $_POST['Proyecto_Busqueda']
)) {

    $proyecto_busqueda = $_POST['Proyecto_Busqueda'];
    $sql_proyecto_busqueda = "SELECT p.Proyecto_Id, Titulo,ua.Alumno_Id, concat(ua.Nombre,' ', ua.Apellido_1,' ', ua.Apellido_2) as 'Nombre Alumno',cic.Ciclo_Id ,cic.Ciclo_Siglas as 'Ciclo',p.Memoria_Link 'Memoria',c.Curso_Id,c.Curso_Nombre 'Curso',group_concat(pc.Nombre SEPARATOR ', ') as 'PalabrasClave', 
    concat(ut.Nombre,' ',ut.Apellido_1,' ',ut.Apellido_2) as 'Tutor/a', ut.Tutor_Id
    FROM ( repositorio.proyectos p 
    INNER JOIN alumnos ua ON p.Alumno_Id = ua.Alumno_Id
    INNER JOIN tutores ut ON p.Tutor_Id = ut.Tutor_Id
    LEFT JOIN asignacionPalabrasClave ast ON ast.Proyecto_Id=p.Proyecto_Id
    LEFT JOIN PalabrasClave pc ON ast.PalabrasClave_Id=pc.PalabrasClave_Id
    INNER JOIN cursos c ON p.Curso_Id=c.Curso_Id
    INNER JOIN ciclos cic ON p.Ciclo_Id=cic.Ciclo_Id
    ) 
    WHERE p.Publico=TRUE and p.Proyecto_Id = $proyecto_busqueda
    group by p.Proyecto_Id;";
    $all_proyecto_busqueda = mysqli_query($con, $sql_proyecto_busqueda);
}

if (isset($_SESSION['user_id'])) {
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Modificar Proyecto</title>
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

 
    <h1 style="margin:1em 0 0 0">Modificar Proyecto</h1>

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
                <label for="Proyecto_Busqueda">Proyecto</label>
                <select name="Proyecto_Busqueda" id="Proyecto_Busqueda" >
                        <?php
                        while ($proyectos = mysqli_fetch_array($all_proyectos, MYSQLI_ASSOC)) :;
                        ?>
                            <option value="" hidden selected="selected"></option>
                            <option value="<?php echo $proyectos["Proyecto_Id"];?>">
                                <?php echo $proyectos["Titulo"].' - '.$proyectos["Nombre Alumno"].' ';
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
				</select>
            </div>
            <button name="Buscar" type="submit" value="Buscar" class="btn btn-primary">Buscar</button>
              
            
            <input value="<?php echo $proyecto_busqueda ?>" hidden name="Proyecto_Busqueda_Id" id="Proyecto_Busqueda_Id">
            <?php 
                if (isset( $_POST['Proyecto_Busqueda']
                )) {
                    ?>

                    <div class="form-group">
                        <label for="MOD_Proyecto_Titulo">Titulo</label>
                        
                        <input style="width:100%;" name="MOD_Proyecto_Titulo" id="MOD_Proyecto_Titulo" required
                            <?php
                            while ($proyecto_1 = mysqli_fetch_array($all_proyecto_busqueda, MYSQLI_ASSOC)):;
                            ?>
                                value="<?php echo $proyecto_1["Titulo"];?>">
                    </div>

                    <div class="form-group">
                        <label for="MOD_Proyecto_Nombre_Alumno">Alumno</label>     
                        <select name="MOD_Proyecto_Nombre_Alumno" id="MOD_Proyecto_Nombre_Alumno">
                                    <option selected="selected" hidden value="<?php echo $proyecto_1["Alumno_Id"];?>">
                                        <?php echo $proyecto_1["Nombre Alumno"];
                                        ?>
                                    </option>
                            <?php
                            while ($alumno_1 = mysqli_fetch_array($all_alumnos, MYSQLI_ASSOC)) :;
                            ?>
                                <option value="<?php echo $alumno_1["Alumno_Id"];?>">
                                    <?php echo $alumno_1["Nombre Alumno"];
                                    ?>
                                </option>
                            <?php
                            endwhile;
                            ?>
				        </select>
                        
                    </div>

                    <div class="form-group">
                        <label for="MOD_Proyecto_Ciclo">Ciclo</label>     
                        <select name="MOD_Proyecto_Ciclo" id="MOD_Proyecto_Ciclo">
                                    <option selected="selected" hidden value="<?php echo $proyecto_1["Ciclo_Id"];?>">
                                        <?php echo $proyecto_1["Ciclo"];
                                        ?>
                                    </option>
                            <?php
                            while ($ciclo_1 = mysqli_fetch_array($all_ciclos, MYSQLI_ASSOC)) :;
                            ?>
                                <option value="<?php echo $ciclo_1["Ciclo_Id"];?>">
                                    <?php echo $ciclo_1["Ciclo_Nombre"];
                                    ?>
                                </option>
                            <?php
                            endwhile;
                            ?>
				        </select>
                    </div>

                    <div class="form-group">
                        <label for="MOD_Proyecto_Memoria">Memoria</label>
                        
                        <input style="width:100%;" name="MOD_Proyecto_Memoria" id="MOD_Proyecto_Memoria" value="<?php echo $proyecto_1["Memoria"];?>">
                    </div>

                    <div class="form-group">
                        <label for="MOD_Proyecto_Curso">Curso</label>     
                        <select name="MOD_Proyecto_Curso" id="MOD_Proyecto_Curso">

                                    <option selected="selected" hidden value="<?php echo $proyecto_1["Curso_Id"];?>">
                                        <?php echo $proyecto_1["Curso"];
                                        ?>
                                    </option>
                            <?php
                            while ($curso_1 = mysqli_fetch_array($all_cursos, MYSQLI_ASSOC)) :;
                            ?>
                                <option value="<?php echo $curso_1["Curso_Id"];?>">
                                    <?php echo $curso_1["Curso_Nombre"];
                                    ?>
                                </option>
                            <?php
                            endwhile;
                            ?>
				        </select>
                    </div>

                    <div class="form-group">
                        <label for="MOD_Proyecto_Nombre_Tutor">Tutor/a</label>     
                        <select name="MOD_Proyecto_Nombre_Tutor" id="MOD_Proyecto_Nombre_Tutor">
                                    <option selected="selected" hidden value="<?php echo $proyecto_1["Tutor_Id"];?>">
                                        <?php echo $proyecto_1["Tutor/a"];
                                        ?>
                                    </option>
                            <?php
                            while ($tutor_1 = mysqli_fetch_array($all_tutores, MYSQLI_ASSOC)) :;
                            ?>
                                <option value="<?php echo $alumno_1["Tutor_Id"];?>">
                                    <?php echo $tutor_1["Nombre Tutor"];
                                    ?>
                                </option>
                            <?php
                            endwhile;
                            ?>
				        </select>
                    </div>

                <?php
                endwhile;
                ?>
                    
            

                <br>
                <button name="mod_proyecto" type="submit" value="mod_proyecto" formaction="update_proyecto.php" class="btn btn-primary">Modificar Proyecto</button>
                <?php
                    }
            ?>
        </form>
    </div>


    
    </body>

<?php
} else {
    header("Location: index.php");
}
?>