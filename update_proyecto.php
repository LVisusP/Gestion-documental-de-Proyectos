<?php 
  session_start();
  $id = $_POST['Proyecto_Busqueda_Id'];
  $titulo = $_POST['MOD_Proyecto_Titulo'];
  $alumno = $_POST['MOD_Proyecto_Nombre_Alumno'];
  $ciclo = $_POST['MOD_Proyecto_Ciclo'];
  $memoria = $_POST['MOD_Proyecto_Memoria'];
  $curso = $_POST['MOD_Proyecto_Curso'];
  $tutor = $_POST['MOD_Proyecto_Nombre_Tutor'];
  if (isset($_SESSION['user_id'])) { 
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['Proyecto_Busqueda']))
    {
        

        // storing it in a variable.
        $sql_update = 
        "UPDATE `proyectos`
            SET `Titulo`= '$titulo',
                `Alumno_Id` = '$alumno',
                `Ciclo_Id` = '$ciclo',
                `Memoria_Link` = '$memoria',
                `Curso_Id`= '$curso',
                `Tutor_Id` = '$tutor'
            WHERE (`Proyecto_Id` = '$id');";
    
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_update))
        {
            header("Location: mod_proyecto.php?success=Proyecto editado");
        }else{
            header("Location: mod_proyecto.php?error=No se ha podido editar");
        };
    };

}else {
   header("Location: index.php");
}
 ?>