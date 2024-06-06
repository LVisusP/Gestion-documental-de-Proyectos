<?php 
  session_start();
  $id = $_POST['Tutor_Busqueda_Id'];
  $nombre = $_POST['Tutor_Busqueda_Nombre'];

  // Store the Category ID in a "id" variable
  $apellido_1 = $_POST['Tutor_Busqueda_Apellido_1']; 
  $apellido_2 = $_POST['Tutor_Busqueda_Apellido_2'];
  $email = $_POST['Tutor_Busqueda_Email'];

  // Creating an insert query using SQL syntax and
  echo ''.$nombre.''.$apellido_1.''.$apellido_2.'';
  // storing it in a variable.

  if (isset($_SESSION['user_id'])) { 
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['Tutor_Busqueda_Password']))
    {
        $hashed_password = password_hash($_POST['Tutor_Busqueda_Password'], PASSWORD_DEFAULT);
        // storing it in a variable.
        $sql_update = 
        "UPDATE `tutores`
            SET `Nombre`= '$nombre',
                `Email` = '$email',
                `Apellido_1` = '$apellido_1',
                `Apellido_2` = '$apellido_2',
                `Password` = '$hashed_password'
            WHERE (`Tutor_Id` = '$id');";
    

          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_update))
        {
            header("Location: mod_tutor.php?success=Tutor editado");
        }else{
            header("Location: mod_tutor.php?error=No se ha podido editar");
        };
    }elseif (isset($_POST['Tutor_Busqueda_Nombre']) && !isset($_POST['Tutor_Busqueda_Password'])) {
         // storing it in a variable.
         $sql_update = 
         "UPDATE `tutores`
             SET `Nombre`= '$nombre',
                 `Email` = '$email',
                 `Apellido_1` = '$apellido_1',
                 `Apellido_2` = '$apellido_2'
             WHERE (`Tutor_Id` = '$id');";
     
 
           // The following code attempts to execute the SQL query
           // 
           if(mysqli_query($con_user,$sql_update))
         {
             header("Location: mod_tutor.php?success=Tutor editado");
         }else{
             header("Location: mod_tutor.php?error=No se ha podido editar");
         };
    };

}else {
   header("Location: index.php");
}
 ?>