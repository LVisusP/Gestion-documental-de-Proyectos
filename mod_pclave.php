<?php
session_start();
$con = mysqli_connect("localhost", "root", "admin", "repositorio");
$sql_pclave = "SELECT * FROM repositorio.palabrasclave";
$all_pclave = mysqli_query($con, $sql_pclave);

if (isset( $_POST['PClave_Busqueda']
)) {

    $pclave_busqueda = $_POST['PClave_Busqueda'];
    $sql_pclave_busqueda = "SELECT * FROM repositorio.palabrasclave WHERE PalabrasClave_Id = $pclave_busqueda";
    $all_pclave_busqueda = mysqli_query($con, $sql_pclave_busqueda);
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

 
    <h1 style="margin:1em 0 0 0">Modificar Palabras Clave</h1>

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
                <label for="PClave_Busqueda">Nombre</label>
                <select name="PClave_Busqueda" id="PClave_Busqueda">
                        <?php
                        while ($pclave = mysqli_fetch_array($all_pclave, MYSQLI_ASSOC)) :;
                        ?>
                            <option value="" hidden selected="selected"></option>
                            <option value="<?php echo $pclave["PalabrasClave_Id"];?>">
                                <?php echo $pclave["Nombre"];
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
				</select>
            </div>
            <button name="Buscar" type="submit" value="Buscar" class="btn btn-primary">Buscar</button>
              
            
            <input value="<?php echo $pclave_busqueda ?>" hidden name="PClave_Busqueda_Id" id="PClave_Busqueda_Id">
            <?php 
                if (isset( $_POST['PClave_Busqueda']
                )) {
                    ?>

                    <div class="form-group">
                        <label for="MOD_PClave_Nombre">Nombre</label>
                        
                        <input name="MOD_PClave_Nombre" id="MOD_PClave_Nombre" required
                            <?php
                            while ($pclave_1 = mysqli_fetch_array($all_pclave_busqueda, MYSQLI_ASSOC)) :;
                            ?>
                                value="<?php echo $pclave_1["Nombre"];?>">
                        <br>
                        <textarea rows="5" cols="50" style="height:11em;" name="MOD_PClave_Descr" type="text" id="MOD_PClave_Descr" placeholder="Descripcion" required><?php echo $pclave_1["Descripcion"] ?></textarea>
                        <?php
                        endwhile;
                        ?>
                    </div>
            

                <br>
                <button name="mod_pclave" type="submit" value="mod_pclave" formaction="update_pclave.php" class="btn btn-primary">Modificar Palabra Clave</button>
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