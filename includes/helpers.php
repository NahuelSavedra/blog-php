<?php

function mostrarError($errores, $campo) {
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alert-danger'>  $errores[$campo]  </div>";
    }
    return $alerta;
}

function borrarError(){
    $_SESSION['errores'] = null;
    unset($_SESSION['errores']);
}