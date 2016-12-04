<?php
define("RELATIVE", "..");
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("America/Bogota");
require_once RELATIVE.'/includes/config.php';
require_once RELATIVE.'/includes/computer.php';
$error = array();
$computer = new computer();
if (isset($_FILES['image']) and isset($_POST['brand']) and isset($_POST['serial']) and
    isset($_POST['name']) and isset($_POST['inventory']) and isset($_POST['location']) and isset($_POST['failure'])){

    if (isset($_POST['id'])){
        $computer->Load('id=?', $_POST['id']);
    }
    $target_dir = RELATIVE."/images/";
    $uploadOk = 1;
    if ($_FILES['image']['name']){
        $target_file = $target_dir.basename($_FILES['image']['name']);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        }
        else {
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            array_push($error, 'Existe una imagen con el mismo nombre');
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            array_push($error, 'Solo se permiten imagenes jpg, png o gif');
            $uploadOk = 0;
        }
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            array_push($error, 'La imagen no pudo ser subida');
            $uploadOk = 0;
        }
    }
    else {
        $target_file = $computer->image;
    }
    if ($uploadOk == 1) {
        if ($_POST['id']) {
            $computer->id = $_POST['id'];
        }
        $computer->image = $target_file;
        $computer->serial = $_POST['serial'];
        $computer->name = $_POST['name'];
        $computer->brand = $_POST['brand'];
        $computer->inventory = $_POST['inventory'];
        $computer->location = $_POST['location'];
        $computer->failure = $_POST['failure'];
        $computer->request_date = date("Y-m-d h:i:s");
        $computer->state = 'en espera';

        $computer->replace();
        ?>
        <script>
            window.location = 'index.php';
        </script>
        <?php
    }
    else{
    ?>
        <a href="javascript:history.back(-1)">Volver</a>
    <?php
        foreach ($error as $e) {
        ?>
            <p><?=$e?></p>
        <?php
        }
    }
}
?>

