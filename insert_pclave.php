<?php 
  session_start();
  
  if (isset($_SESSION['user_id'])) { 
    
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['INS_PClave_Nombre']))
    {
        
        // Store the Product name in a "name" variable
        $nombre = $_POST['INS_PClave_Nombre'];
        $descr = $_POST['INS_PClave_Descr'];
    
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `palabrasclave`(`Nombre`,`Descripcion`)
            VALUES ('$nombre','$descr')";
          
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_insert))
        {
            header("Location: add_pclave.php?success=Palabra clave añadida");
        }else{
            header("Location: add_pclave.php?error=No se ha podido añadir");
        };
    };

}else {
   header("Location: index.php");
}
 ?>

 