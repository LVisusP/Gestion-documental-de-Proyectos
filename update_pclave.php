<?php 
  session_start();
  $id = $_POST['PClave_Busqueda_Id'];
  $nombre = $_POST['MOD_PClave_Nombre'];
  $descr = $_POST['MOD_PClave_Descr'];
  if (isset($_SESSION['user_id'])) { 
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['PClave_Busqueda']))
    {
        

        // storing it in a variable.
        $sql_update = 
        "UPDATE `Palabrasclave`
            SET `Nombre`= '$nombre',
                `Descripcion` = '$descr'
            WHERE (`PalabrasClave_Id` = '$id');";
    
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_update))
        {
            header("Location: mod_pclave.php?success=Palabra clave editada");
        }else{
            header("Location: mod_pclave.php?error=No se ha podido editar");
        };
    };

}else {
   header("Location: index.php");
}
 ?>