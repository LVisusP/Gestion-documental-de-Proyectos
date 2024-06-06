<?php 
  session_start();
  
  if (isset($_SESSION['user_id'])) { 
    
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['INS_Ciclo_Nombre']))
    {
        
        // Store the Product name in a "name" variable
        $nombre = $_POST['INS_Ciclo_Nombre'];
        $siglas = $_POST['INS_Ciclo_Siglas'];
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `ciclos`(`Ciclo_Siglas`,`Ciclo_Nombre`)
            VALUES ('$siglas','$nombre')";
          
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_insert))
        {
            header("Location: add_ciclo.php?success=Curso añadido");
        }else{
            header("Location: add_ciclo.php?error=No se ha podido añadir");
        };
    };

}else {
   header("Location: index.php");
}
 ?>

 