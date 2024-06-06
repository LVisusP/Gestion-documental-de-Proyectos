<?php 
  session_start();
  
  if (isset($_SESSION['user_id'])) { 
    
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['INS_Alumno_Nombre']))
    {
        
        // Store the Product name in a "name" variable
        $nombre = $_POST['INS_Alumno_Nombre'];

        // Store the Category ID in a "id" variable
        $apellido_1 = $_POST['INS_Alumno_Apellido_1']; 
        $apellido_2 = $_POST['INS_Alumno_Apellido_2']; 
        // Creating an insert query using SQL syntax and
    
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `alumnos`(`Nombre`, `Apellido_1`,`Apellido_2`)
            VALUES ('$nombre','$apellido_1','$apellido_2')";
          
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_insert))
        {
            header("Location: add_alumno.php?success=Usuario añadido");
        }else{
            header("Location: add_alumno.php?error=No se ha podido añadir");
        };
    };

}else {
   header("Location: index.php");
}
 ?>