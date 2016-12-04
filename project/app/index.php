<?php
define("RELATIVE", "..");
include RELATIVE.'/includes/header.php';
?>
<h2 class="text-center">Aplicativo para solicitud y control de mantenimiento de equipos de computo</h2>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Listado de solicitudes</a></li>
                <li><a href="request_form.php">Crear Solicitud</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login_admin.php">Ir al administrador</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
include_once RELATIVE.'/includes/config.php';
include_once RELATIVE.'/includes/computer.php';
$computer = new Computer();
$computer_list = $computer->find('id<100');
?>
<table class="table">
    <thead>
    <tr>
        <th>Serial</th>
        <th>Nombre</th>
        <th>Marca</th>
        <th>Inventario</th>
        <th>Ubicación</th>
        <th>Estado</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($computer_list as $item): ?>
        <tr>
            <td><?=$item->serial; ?></td>
            <td><?=$item->name; ?></td>
            <td><?=$item->brand; ?></td>
            <td><?=$item->inventory; ?></td>
            <td><?=$item->location; ?></td>
            <td><?=$item->state; ?></td>
            <td><a href="request_detail.php?pk=<?=$item->id;?>"><i class="glyphicon glyphicon-file"></i></a></td>
            <td>
            <?php if ($item->state == 'en espera'){?>
                <a href="javascript:check_solved(<?=$item->id;?>)"><i class="glyphicon glyphicon-ok-circle"></i></a></td>
            <?php
            }?>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<script>
    function check_solved(e) {
        if (confirm('¿Está seguro que desea marcar como solucionada esta solicitud')) {
            window.location = 'check_solved.php?id=' + e
        }
    }
</script>

<?php
include RELATIVE.'/includes/footer.php';
?>

