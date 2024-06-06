<?php 
  session_start();
  
  if (isset($_SESSION['user_id'])) { 
    
    $con_user = mysqli_connect("localhost", "root", "admin", "repositorio");
    if(isset($_POST['INS_Tutor_Nombre']))
    {
        
        // Store the Product name in a "name" variable
        $nombre = $_POST['INS_Tutor_Nombre'];

        // Store the Category ID in a "id" variable
        $apellido_1 = $_POST['INS_Tutor_Apellido_1']; 
        $apellido_2 = $_POST['INS_Tutor_Apellido_2']; 
        $username = $_POST['INS_Tutor_Id'];
        $email = $_POST['INS_Tutor_Email'];
        $password = $_POST['INS_Tutor_Password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Creating an insert query using SQL syntax and
    
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `tutores`(`Tutor_Id`,`Nombre`,`Apellido_1`,`Apellido_2`,`Email`,`Password`)
            VALUES ('$username','$nombre','$apellido_1','$apellido_2','$email','$hashed_password')";
          
          // The following code attempts to execute the SQL query
          // 
          if(mysqli_query($con_user,$sql_insert))
        {
            header("Location: add_tutor.php?success=Usuario añadido");
        }else{
            header("Location: add_tutor.php?error=No se ha podido añadir");
        };
    };

}else {
   header("Location: index.php");
}
 ?>