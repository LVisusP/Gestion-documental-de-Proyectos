<?php
    session_start();
    include("db_conn.php");

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"]; 
        $password = $_POST["password"];

        if (empty($username)) {
            header("Location: login.php?error=Usuario requerido");
        }elseif (empty($password)) {
            header("Location: login.php?error=Contraseña requerida");
        }else {
            $stmt = $con->prepare("SELECT * FROM tutores WHERE Tutor_Id=?");
            $stmt->execute([$username]);

            if ($stmt->rowCount() === 1) {
               $user = $stmt->fetch();
               $user_id = $user["Tutor_Id"];
               $user_password = $user["Password"];
               if ($username === $user_id) {
				if (password_verify($password, $user_password)) {
					$_SESSION['user_id'] = $user_id;
					header("Location: gestion_admin.php");
				}else {
					header("Location: login.php?error=Contraseña Incorrecta");
				}
			}else {
				header("Location: login.php?error=Usuario incorrecto");
			}
            }else
            header("Location: login.php?error=Usuario o contraseña incorrectos");
       }
    }
?>