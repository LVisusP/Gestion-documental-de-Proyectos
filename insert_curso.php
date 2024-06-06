<?php 
  session_start();
  
  if (isset($_SESSION['user_id'])) { 
    
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['INS_Curso_Nombre']))
    {
        
        // Store the Product name in a "name" variable
        $nombre = $_POST['INS_Curso_Nombre'];
    
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `cursos`(`Curso_Nombre`)
            VALUES ('$nombre')";
          
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_insert))
        {
            header("Location: add_curso.php?success=Curso añadido");
        }else{
            header("Location: add_curso.php?error=No se ha podido añadir");
        };
    };

}else {
   header("Location: index.php");
}
 ?>

 