<?php
define("RELATIVE", "..");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$error = array();
include RELATIVE.'/includes/header.php';
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Listado de solicitudes</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Ir al administrador</a></li>
            </ul>
        </div>
    </div>
</nav>
<h2 class="text-center">Detalle de la solicitud</h2>
<?php
include_once RELATIVE.'/includes/config.php';
include_once RELATIVE.'/includes/computer.php';
$computer = new Computer();
$computer->Load('id=?', $_GET['pk']);
?>
<div class="row">
    <div class="col-xs-3 col-xs-offset-1">
        <img src="<?=$computer->image;?>" alt="">
    </div>
    <div class="col-xs-4">
        <p><strong>Serial:</strong> <?=$computer->serial;?></p>
        <p><strong>Nombre:</strong> <?=$computer->name;?></p>
        <p><strong>Marca:</strong> <?=$computer->brand;?></p>
        <p><strong>No. Inventario:</strong> <?=$computer->inventory;?></p>
        <p><strong>Ubicación:</strong> <?=$computer->location;?></p>
        <p><strong>Fecha solicitud:</strong> <?=$computer->request_date;?></p>
    </div>
    <div class="col-xs-4">
        <p><strong>Estado:</strong> <?=$computer->state;?></p>
        <p><strong>Falla:</strong> <?=$computer->failure;?></p>
    </div>
</div>
<h2 class="text-center">Asignar fecha de visita</h2>
<form action="request_detail.php" method="post" class="form-horizontal">
    <input type="hidden" name="id" value="<?=$computer->id;?>">
    <div class="form-group">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <label for="visit_date">Fecha de visita</label>
                <input type="date" id="visit_date" name="visit_date" placeholder="YYYY-MM-DD" value="<?=$computer->visit_date;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <label for="visit_time">Hora de la visita</label>
                <input type="time" id="visit_time" name="visit_time"
                value="<?=$computer->visit_time;?>">
            </div>
        </div>
        <?php
            if(!$computer->visit_date and !$computer->visit_time) {
        ?>
        <div class="row">
            <div class="col-xs-1 col-xs-offset-7">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
            <?php
            }
            ?>
    </div>
</form>

<?php
    if (isset($_POST['visit_date']) and isset($_POST['visit_time']) and
        isset($_POST['id'])){
        $computer = new Computer();
        $computer->Load('id=?', $_POST['id']);

        $computer->visit_date = $_POST['visit_date'];
        $computer->visit_time = $_POST['visit_time'];
        $computer->replace();
?>
        <script>
            window.location = 'index.php';
        </script>
<?php
    }
?>
<?php
    foreach ($error as $e) {
?>
    <p><?=$e?></p>
<?php
    }
?>