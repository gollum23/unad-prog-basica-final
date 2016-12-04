<?php
define("RELATIVE", "..");
session_start();
include RELATIVE.'/includes/header.php';
include_once RELATIVE.'/includes/config.php';
include_once RELATIVE.'/includes/administrator.php';

if (isset($_SESSION['logged'])) {
    header('Location: admin.php');
}


?>
<h2 class="text-center">Administrador</h2>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Listado de solicitudes</a></li>
                <li><a href="request_form.php">Crear solicitud</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="login_admin.php">Ir al administrador</a></li>
            </ul>
        </div>
    </div>
</nav>
<form action="login_admin.php" method="post">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Admin">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="12345">
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-default">Entrar</button>
            </div>
        </div>
    </div>
</form>
<?php

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $pass = md5($_POST['password']);
    $user = new administrator();
    $user->Load('username=?', $username);
    if ($user->password == $pass) {
        header('Location: admin.php');
        $_SESSION['logged'] = true;
    }
    else {
?>
        <div class="alert alert-danger">Usuario y/o contraseña incorrecta</div>
<?php
    }
}
include RELATIVE.'/includes/footer.php';

