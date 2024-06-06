<?php
       //Almacenamos las credenciales de la db en variables
       $hostname = "localhost";
       $username = "root";
       $password = "admin";
       $dbname = "repositorio";
       //conectamos con la db
       try {
        $con = new PDO("mysql:host=$hostname;dbname=$dbname", 
                        $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo "Connection failed : ". $e->getMessage();
    }
?>