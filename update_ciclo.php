<?php 
  session_start();
  $id = $_POST['Ciclo_Busqueda_Id'];
  $siglas = $_POST['MOD_Ciclo_Siglas'];
  $nombre = $_POST['MOD_Ciclo_Nombre'];

  if (isset($_SESSION['user_id'])) { 
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['Ciclo_Busqueda']))
    {
        

        // storing it in a variable.
        $sql_update = 
        "UPDATE `Ciclos`
            SET `Ciclo_Nombre`= '$nombre',
                `Ciclo_Siglas`= '$siglas'
            WHERE (`Ciclo_Id` = '$id');";
    
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_update))
        {
            header("Location: mod_ciclo.php?success=Ciclo editado");
        }else{
            header("Location: mod_ciclo.php?error=No se ha podido editar");
        };
    };

}else {
   header("Location: index.php");
}
 ?>