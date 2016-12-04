<?php
session_start();
define("RELATIVE", "..");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once RELATIVE.'/includes/config.php';

if (isset($_SESSION['logged'])) {
    $filename = "backup-".date("d-m-Y").".sql";
    $mime = "application/x-gzip";

    echo 'Content-Disposition: attachment; filename"' . $filename . '"';

    header("Content-Type: " . $mime);
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $cmd = "mysqldump -h $SERVER_DB -u $USER_DB --password=$PASS_DB $NAME_DB";

    passthru($cmd);

    exit(0);
}
else {
    header('Location: login_admin.php');
}

