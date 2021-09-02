<?php
    //iniciar la sesion y conexion con bdd
    require_once 'includes/conection.php';

    //Recoger datos del form
    if(isset($_POST)){
        //Borrar sesion antigua
        if(isset($_SESSION['error_login'])){
            unset($_SESSION['error_login']);
        }
        //recoger datos de usuario
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        //Comprobar la password
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = mysqli_query($db, $sql);

        if($login && mysqli_num_rows($login) == 1){
            $usuario = mysqli_fetch_assoc($login);

            $verify = password_verify($password, $usuario['password']);

            if($verify){
                //Utilizar una sesion para guardar datos de logeo
                $_SESSION['usuario'] = $usuario;
            }else {
                //mensaje de error
                $_SESSION['error_login'] = "Usuario o contraseña son incorrectos";
            }
        }else {
            //mensaje de error
            $_SESSION['error_login'] = "Usuario o contraseña son incorrectos";
        }
    }
header("Location: index.php");

