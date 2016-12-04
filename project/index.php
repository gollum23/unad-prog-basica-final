<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    define("RELATIVE", ".");
    define("ABS_PATH", realpath(dirname(__FILE__)));
    include ABS_PATH.'/includes/header.php';
    include ABS_PATH.'/includes/config.php';

?>
    <div class="panel panel-primary">
        <div class="panel-heading">Ejercicio</div>
        <div class="panel-body">

            <p>El gerente de la Clínica Reina Inmaculada, convoca al departamento de desarrollo de software, con el fin de crear un aplicativo en PHP, que
                almacene toda la información en una base de datos mySQL, cuyo objetivo es el siguiente:</p>
            <p>Ser capaz de gestionar las solicitudes de mantenimiento de equipos biomédicos, en cada una de las unidades funcionales, de manera tal que
                los técnicos de mantenimiento conozcan en tiempo real las labores que tengan que desempeñar y así mismo los líderes de las unidades
                funcionales conozcan la fecha y hora en la cual el técnico de mantenimiento hará la inspección y reparación del equipo</p>
            <p>El aplicativo debe tener:</p>
            <p>Módulo de solicitudes: debe contener un formulario donde el usuario indique:
                serial del equipo, nombre del equipo, foto del equipo, marca del equipo, número de inventario del equipo, ubicación del equipo, falla
                que presenta dicho equipo, hora en que se registra dicha solicitud, y una casilla de estado (en espera, solucionado)</p>
            <p>Módulo de atención a solicitudes: debe tener una interfaz donde el técnico de mantenimiento pueda observar las solicitudes pendientes
                e indicar la fecha y hora en la cual irá a inspeccionar el equipo, adicional debe tener una casilla de estado (en espera, solucionado)</p>
            <p>Módulo de administración: allí solo se puede acceder con nombre de usuario y contraseña (Admin, 12345), la contraseña debe almacenarse
                en base de datos y codificada en MD5.</p>
            <p>Allí el administrador puede generar reportes en PDF (librería FPDF), de las solicitudes solucionadas y de las solicitudes por atender,
                con fecha de registro de la solicitud y con la fecha en que fue solucionada si es que ya fue solucionada</p>
            <p>También permitirá hacer copias de seguridad de la base de datos mediante
                mysqldump.</p>

            <p><a href="app/">Ir al ejercicio</a> <a href="app/setup.php">Crear Tabla</a></p>
        </div>
    </div>
<?php
    include ABS_PATH.'/includes/footer.php';
?>
