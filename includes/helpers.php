<?php

function mostrarError($errores, $campo) {
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alert-danger'>  $errores[$campo]  </div>";
    }
    return $alerta;
}

function borrarError(){
    if(isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
    }

        if(isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
}

function conseguirCategorias($conexion)
{
    $sql = "SELECT * FROM categorias ORDER BY id ASC ";
    $categorias = mysqli_query($conexion, $sql);

    if($categorias && mysqli_num_rows($categorias) >= 1){
        $result = $categorias;
    }
    return $result;
}