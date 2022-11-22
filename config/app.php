<?php
//Aca importamos el autoload para tener un mejor manejo de nuestros archivos
//importamos el archivo de database por lo cual ya tenemos acceso a la variable $db que es nuestra conexion
//y le pasamos esta conexion al modelo base
require __DIR__ . "./../vendor/autoload.php";
require __DIR__ . "./database.php";
use Model\BaseModel;

BaseModel::setDB($db);