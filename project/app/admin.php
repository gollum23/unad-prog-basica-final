<?php
session_start();
define("RELATIVE", "..");
include RELATIVE.'/includes/header.php';
if (!isset($_SESSION['logged'])) {
    header('Location: login_admin.php');
}
?>
<h2 class="text-center">Aplicativo para el control de equipos de computo</h2>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Listado de solicitudes</a></li>
                <li><a href="request_form.php">Agregar solicitud</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Salir</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tareas administrativas
                </div>
                <div class="panel-body">
                    <a class="btn btn-primary" href="export_pdf.php" target="_blank">Exportar a pdf</a>
                    <br>
                    <br>
                    <a class="btn btn-info" href="backup_db.php">Copia de seguridad</a>
                </div>
            </div>
        </div>
    </div>

<?php
include RELATIVE.'/includes/footer.php';
?>