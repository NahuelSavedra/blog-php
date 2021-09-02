<?php

    if (isset($_POST)){
        //traer conexion
        require_once 'includes/conection.php';
        //iniciar session
        if (!isset($_SESSION)) {
            session_start();
        }

        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

        //Array de errores
        $errores = array();

        //Validacion de datos nombre
        if(!empty($nombre) && is_string($nombre)){
            $nombre_validate = true;
        }else{
            $nombre_validate = false;
            $errores['nombre'] = "El nombre es invalido";
        }
        //Validacion de datos apellido
        if(!empty($apellido) && is_string($apellido)){
            $apellido_validate = true;
        }else{
            $apellido_validate = false;
            $errores['apellido'] = "El apellido es invalido";
        }
        //Validacion de datos email
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validate = true;
        }else{
            $email_validate = false;
            $errores['email'] = "El email es invalido";
        }
        //Validacion de datos contraseña
        if(!empty($password)){
            $password_validate = true;
        }else{
            $password_validate = false;
            $errores['password'] = "La contraseña esta vacia";
        }
        $guardar_usuario = false;
        if(count($errores) == 0){
            $guardar_usuario = true;

            //cifrar la contraseña
            $password_segura = password_hash($password, PASSWORD_BCRYPT,['cost'=>4]);

            //insertar usuario en tabla de bdd
            $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$email', '$password_segura', CURDATE());";
            $guardar = mysqli_query($db ,$sql);

            if($guardar){
                $_SESSION['completado']= "El registro se ha completado con exito";
            }else {
                $_SESSION['errores']['general'] = "Fallo al registrar el usuario";
            }
        } else {
            $_SESSION['errores'] = $errores;
        }
    }
header('Location: index.php');
