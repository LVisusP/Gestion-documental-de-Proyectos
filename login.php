<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: gestion_admin.php");
} else {
    
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

    <title>Log In</title>
</head>

<body>
    <br>
    <h1>Inicio de sesión</h1>
    <div class="d-flex justify-content-center align-items-center">
        <form class="p-5 rounded shadow" style="width: 30em" action="auth.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
	  		<div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error'])?>
			</div>
		    <?php } ?>
            <div class="form-group" >
                <label for="exampleInputEmail1">Usuario</label>
                <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <BR>
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
    </div>
</body>

</html>

<?php

}
?>