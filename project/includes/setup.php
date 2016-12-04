<?php
include RELATIVE."/includes/config.php";

$db = NewADOConnection("$DRIVER_DB://$USER_DB:$PASS_DB@$SERVER_DB/$NAME_DB");

$db -> Execute("CREATE TABLE `computers` (
              `id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'id del equipo',
              `serial` VARCHAR (50) NOT NULL COMMENT 'serial del equipo',
              `name` VARCHAR (50) NOT NULL COMMENT 'nombrre del equipo',
              `image` VARCHAR (100) NOT NULL COMMENT 'imagen del equipo',
              `brand` VARCHAR (30) NOT NULL COMMENT 'marca del equipo',
              `inventory` VARCHAR (30) NOT NULL COMMENT 'Número de inventario',
              `location` VARCHAR (30) NOT NULL COMMENT 'Ubicación del equipo',
              `failure` TEXT NOT NULL COMMENT 'Falla del equipo',
              `request_date` DATETIME NOT NULL COMMENT 'Fecha de Solicitud',
              `visit_date` DATE NULL COMMENT 'Fecha de Visita',
              `visit_time` TIME NULL COMMENT 'Hora de Visita',
              `state` VARCHAR (20) NOT NULL COMMENT 'estado de la solicitud',
              PRIMARY KEY (`id`)) ENGINE = InnoDB;
    ");

$db -> Execute("CREATE TABLE `administrators`(
              `id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'id del usuario',
              `username` VARCHAR (30) NOT NULL COMMENT 'nombre de usuario',
              `password` VARCHAR (100) NOT NULL COMMENT 'password del usuario',
              PRIMARY KEY (`id`)) ENGINE = InnoDB;
    ");

$db -> Execute("INSERT INTO `administrators` VALUES(
              null, 'Admin', md5('12345'))
    ");