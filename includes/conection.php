<?php
    //conexion a bdd

    $server = 'localhost';
    $username = 'root';
    $password= 'root';
    $bdd = 'blog_php';

    $db = mysqli_connect($server, $username, $password, $bdd);

    mysqli_query($db, "SET NAMES 'utf8'");

    //Iniciar la sesion
    session_start();
