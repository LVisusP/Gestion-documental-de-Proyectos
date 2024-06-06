<?php 
  session_start();
  $id = $_POST['Curso_Busqueda_Id'];
  $nombre = $_POST['MOD_Curso_Nombre'];

  if (isset($_SESSION['user_id'])) { 
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['Curso_Busqueda']))
    {
        

        // storing it in a variable.
        $sql_update = 
        "UPDATE `Cursos`
            SET `Curso_Nombre`= '$nombre'
            WHERE (`Curso_Id` = '$id');";
    
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_update))
        {
            header("Location: mod_curso.php?success=Curso editado");
        }else{
            header("Location: mod_curso.php?error=No se ha podido editar");
        };
    };

}else {
   header("Location: index.php");
}
 ?>