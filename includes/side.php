<?php require_once'includes/helpers.php'; ?>
<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Login -->
    <div class="container">
        <!--Datos del usuario -->
        <?php if(isset($_SESSION['usuario'])): ?>
        <h4>Bienvenido,
        <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?>
        </h4>
        <br>
        <a class="btn btn-outline-primary btn-sm" href="cerrar.php">Mis datos</a>
        <a class="btn btn-outline-warning btn-sm" href="cerrar.php">Crear post</a>
        <a class="btn btn-outline-info btn-sm" href="cerrar.php">Crear categoria</a>
        <a class="btn btn-outline-danger btn-sm" href="cerrar.php">Cerrar sesion</a>
        <?php endif; ?>

        <h3 class="mt-3">Iniciar sesion</h3>
        <!-- Errores -->
        <?php if(isset($_SESSION['error_login'])): ?>
        <div class="alert-danger">
                <?= $_SESSION['error_login'] ?>
        </div>
        <?php endif; ?>
    <form action="login.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Ingrese su email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
        </div>
        <input type="submit" name="submit" class="btn btn-primary mb-3" value="Ingresar">
    </form>
    </div>

    <!-- Register-->
    <div class="container">
        <h3>Registro</h3>

        <!--Mostrar errrores -->
        <?php if(isset($_SESSION['completado'])): ?>
            <div class="alert-info">  <?php echo $_SESSION['completado']; ?> </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
        <div class="alert-danger">
            <?php $_SESSION['errores']['general']; ?>
        </div>
        <?php endif; ?>


        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''?>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" placeholder="Ingrese su apellido">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''?>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Ingrese su email">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''?>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''?>

            <input type="submit" name="submit" class="btn btn-primary mb-3" value="Registrar">
        </form>
        <?php borrarError(); ?>
    </div>
</div>
</div>
</div>