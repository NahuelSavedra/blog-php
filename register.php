<?php
    session_start();
    if (isset($_POST)){
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;

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
            $email_validate = true;
        }else{
            $email_validate = false;
            $errores['password'] = "La contraseña esta vacia";
        }
        $guardar_usuario = false;
        if(count($errores) == 0){
            $guardar_usuario = true;
            //insertar usuario en tabla de bdd
        } else {
            $_SESSION['errores'] = $errores;
            header('Location: index.php');
        }
    }