<?php
session_start();
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

 
    <h1 style="margin:1em 0 0 0">Añadir Ciclo</h1>

    <div class="d-flex justify-content-center align-items-center">
            <a href="gestion_admin.php" class="btn btn-primary" style="background-color: #1cb495; border:0;">VOLVER</a>
            </div>
    <br>
    <div class="d-flex justify-content-center align-items-center">
           
        <form class="p-5 rounded shadow" style="width: 30em" action="insert_ciclo.php" method="POST">


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
                <label for="INS_Ciclo_Siglas">Siglas</label>
                <input name="INS_Ciclo_Siglas" type="text" id="INS_Ciclo_Siglas" placeholder="Siglas">
            </div>
            <br>
            <div class="form-group">
                <label for="INS_Ciclo_Nombre">Nombre</label>
                <input name="INS_Ciclo_Nombre" type="text" id="INS_Ciclo_Nombre" placeholder="Nombre">
            </div>
            <br>
            <button name="submit_ciclo" type="submit" value="submit_ciclo" class="btn btn-primary">Añadir Ciclo</button>
        </form>
    </div>


    
    </body>

<?php
} else {
    header("Location: index.php");
}
?>