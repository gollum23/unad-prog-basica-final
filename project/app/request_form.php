<?php
define("RELATIVE", "..");
include RELATIVE.'/includes/header.php';
require_once RELATIVE.'/includes/config.php';
require_once RELATIVE.'/includes/computer.php';

$computer = new computer();

if (isset($_GET['pk'])) {
    $computer->Load('id=?', $_GET['pk']);
    $id= $computer->id;
    $image = $computer->image;
    $serial = $computer->serial;
    $processor = $computer->processor;
    $brand = $computer->brand;
    $ram = $computer->ram;
    $hd = $computer->hd;
}
else {
    $id=null;
    $image = '';
    $serial = '';
    $processor = '';
    $brand = '';
    $ram = '';
    $hd = '';
}
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Listado de solicitudes</a></li>
                <li class="active"><a href="#">Crear Solicitud</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login_admin.php">Ir al administrador</a></li>
            </ul>
        </div>
    </div>
</nav>
<h2 class="text-center">Crear solicitud de mantenimiento</h2>
<form action="add_edit.php" method="post" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="form-group">
        <div class="row">
            <div class="col-xs-3 col-xs-offset-1">
                <?php
                if ($image) {
                    ?>
                    <label for="image">Imágen, actualmente: <?=$image?></label>
                    <?php
                }
                else {
                    ?>
                    <label for="image">Imágen</label>
                    <?php
                }
                ?>
                <input class="form-control" type="file" name="image" id="image" value="<?=$image?>">
            </div>
            <div class="col-xs-3 col-xs-offset-1">
                <label for="serial">Serial</label>
                <input class="form-control" type="text" name="serial" id="serial" value="<?=$serial?>">
            </div>
            <div class="col-xs-3 col-xs-offset-1">
                <label for="name">Nombre</label>
                <input class="form-control" type="text" name="name" id="name" value="<?=$name?>">
            </div>


        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-3 col-xs-offset-1">
                <label for="brand">Marca</label>
                <input class="form-control" type="text" name="brand" id="brand" value="<?=$brand?>">
            </div>
            <div class="col-xs-3 col-xs-offset-1">
                <label for="inventory">No Inventario</label>
                <input class="form-control" type="text" name="inventory" id="inventory" value="<?=$brand?>">
            </div>
            <div class="col-xs-3 col-xs-offset-1">
                <label for="location">Ubicación</label>
                <input class="form-control" type="text" name="location" id="location" value="<?=$location?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-11 col-xs-offset-1">
                <label for="failure">Descripción de la falla</label>
                <textarea class="form-control" name="failure" id="failure" value="<?=$processor?>" rows="10"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-1 col-xs-offset-11">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
<?php
include '../includes/footer.php';
?>