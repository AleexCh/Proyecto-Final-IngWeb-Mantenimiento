<?php

//Esta es la funcion principal el servidor debe ejecutar desde public y llamar a este archivo el cual importa el
//app.php y tambien el archivo de rutas

require_once __DIR__ . "./../config/app.php";
require_once __DIR__ . "./../router/routes.php";