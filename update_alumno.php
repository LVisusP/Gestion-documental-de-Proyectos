<?php 
  session_start();
  $id = $_POST['Alumno_Busqueda_Id'];
  $nombre = $_POST['Alumno_Busqueda_Nombre'];

  // Store the Category ID in a "id" variable
  $apellido_1 = $_POST['Alumno_Busqueda_Apellido_1']; 
  $apellido_2 = $_POST['Alumno_Busqueda_Apellido_2']; 

  // Creating an insert query using SQL syntax and
  echo ''.$nombre.''.$apellido_1.''.$apellido_2.'';
  // storing it in a variable.

  if (isset($_SESSION['user_id'])) { 
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['Alumno_Busqueda_Nombre']))
    {
        

        // storing it in a variable.
        $sql_update = 
        "UPDATE `alumnos`
            SET `Nombre`= '$nombre',
                `Apellido_1` = '$apellido_1',
                `Apellido_2` = '$apellido_2'
            WHERE (`Alumno_Id` = '$id');";
    

          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_update))
        {
            header("Location: mod_alumno.php?success=Usuario editado");
        }else{
            header("Location: mod_alumno.php?error=No se ha podido editar");
        };
    };

}else {
   header("Location: index.php");
}
 ?>