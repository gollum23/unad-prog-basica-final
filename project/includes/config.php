<?php
// Incluir libreria adodb
include RELATIVE.'/adodb5/adodb.inc.php';

include RELATIVE.'/adodb5/adodb-active-record.inc.php';
//
// Seleccionar el driver dependiendo de la base de datos
$DRIVER_DB = 'mysqli';
$SERVER_DB = 'localhost';
$USER_DB = 'admin';
$PASS_DB = 'pass';
$NAME_DB = 'fase_final';

$db = NewADOConnection("$DRIVER_DB://$USER_DB:$PASS_DB@$SERVER_DB/$NAME_DB");

// Incluir el ORM (Object Relation Map)
ADOdb_Active_Record::SetDatabaseAdapter($db);