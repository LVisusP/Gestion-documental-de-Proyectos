<?php
session_start();
$con = mysqli_connect("localhost", "root", "admin", "repositorio");
$sql_ciclos = "SELECT * FROM repositorio.ciclos";
$all_ciclos = mysqli_query($con, $sql_ciclos);

if (isset( $_POST['Ciclo_Busqueda']
)) {

    $ciclo_busqueda = $_POST['Ciclo_Busqueda'];
    $sql_ciclo_busqueda = "SELECT * FROM repositorio.ciclos WHERE Ciclo_Id = $ciclo_busqueda";
    $all_ciclo_busqueda = mysqli_query($con, $sql_ciclo_busqueda);
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

 
    <h1 style="margin:1em 0 0 0">Modificar Ciclo</h1>

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
                <label for="Ciclo_Busqueda">Nombre</label>
                <select name="Ciclo_Busqueda" id="Ciclo_Busqueda">
                        <?php
                        while ($ciclos = mysqli_fetch_array($all_ciclos, MYSQLI_ASSOC)) :;
                        ?>
                            <option value="" hidden selected="selected"></option>
                            <option value="<?php echo $ciclos["Ciclo_Id"];?>">
                                <?php echo $ciclos["Ciclo_Nombre"];
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
				</select>
            </div>
            <button name="Buscar" type="submit" value="Buscar" class="btn btn-primary">Buscar</button>
              
            
            <input value="<?php echo $ciclo_busqueda ?>" hidden name="Ciclo_Busqueda_Id" id="Ciclo_Busqueda_Id">
            <?php 
                if (isset( $_POST['Ciclo_Busqueda']
                )) {
                    ?>

                    <div class="form-group">
                        <label for="MOD_Ciclo_Siglas">Siglas</label>
                        
                        <input style="width:100%;"name="MOD_Ciclo_Siglas" id="MOD_Ciclo_Siglas" required
                            <?php
                            while ($ciclos_1 = mysqli_fetch_array($all_ciclo_busqueda, MYSQLI_ASSOC)) :;
                            ?>
                                value="<?php echo $ciclos_1["Ciclo_Siglas"];?>">
                    </div>

                    <div class="form-group">
                        <label for="MOD_Ciclo_Nombre">Nombre</label>
                        
                        <input style="width:100%;" name="MOD_Ciclo_Nombre" id="MOD_Ciclo_Nombre" required
                                value="<?php echo $ciclos_1["Ciclo_Nombre"];?>">
                        <?php
                        endwhile;
                        ?>
                    </div>
            

                <br>
                <button name="mod_ciclo" type="submit" value="mod_ciclo" formaction="update_ciclo.php" class="btn btn-primary">Modificar Ciclo</button>
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