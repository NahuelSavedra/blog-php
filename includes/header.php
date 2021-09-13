<?php require_once ('conection.php'); ?>
<?php require_once ('helpers.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Blog desarrollado solo con PHP, HTML y CSS" />
    <meta name="author" content="Nahuel Savedra" />
    <title>PHP Videogames Blog</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Blog PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                    <?php
                        $categorias = conseguirCategorias($db);
                        while($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="categoria.php?id<?= $categoria['id'] ?>"> <?= $categoria['nombre'] ?> </a>
                        </li>
                    <?php endwhile; ?>
            </ul>
        </div>
    </div>
</nav>