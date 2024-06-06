<?php 
  session_start();
  
  if (isset($_SESSION['user_id'])) { 
    
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['INS_Titulo']))
    {
        
        // Store the Product name in a "name" variable
        $alumno_id = $_POST['INS_Alumno_Id'];
        $ciclo_id = $_POST['INS_Ciclo_Id'];
        $titulo = $_POST['INS_Titulo'];
        $memoria_link = $_POST['INS_Memoria_Link'];
        $curso_id = $_POST['INS_Cursos_Id'];
        $tutor_id = $_SESSION['user_id'];
        $publico = $_POST['publico'];
        if ($publico = 'true') {
          $publico = 1;
        }else{
          $publico = 0;
        }
    
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `repositorio`.`proyectos` 
        ( `Alumno_Id`, `Tutor_Id`,`Ciclo_Id`,`Titulo`, `Memoria_Link`, `Curso_Id`,  `Publico`) 
        VALUES ('$alumno_id', '$tutor_id',' $ciclo_id', '$titulo ', ' $memoria_link', '$curso_id', '$publico');";
          
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_insert))
        {
            header("Location: add_proyecto.php?success=Proyecto añadido");
        }else{
            header("Location: add_proyecto.php?error=No se ha podido añadir");
        };
    };

}else {
   header("Location: index.php");
}
 ?>

 