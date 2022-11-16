<?php

namespace Router;

use App\Router;
use Controller\AuthController;
use Controller\PagesController;

$router = new Router();

//Auth Routes
$router->get("/registrar", [AuthController::class, "getRegister"]);
$router->post("/registrar", [AuthController::class, "postRegister"]);

$router->get("/login", [AuthController::class, "getLogin"]);
$router->post("/login", [AuthController::class, "postLogin"]);

$router->get("/recuperar-cuenta", [AuthController::class, "getRecoverAccount"]);
$router->post("/recuperar-cuenta", [AuthController::class, "postRecoverAccount"]);

$router->get("/cambiar-contraseña", [AuthController::class, "getChangePassword"]);
$router->post("/cambiar-contraseña", [AuthController::class, "postChangePassword"]);

//Public Routes
$router->get("/", [PagesController::class, "index"]);
$router->get("/equipos", [PagesController::class, "teams"]);

//Admin Routes


$router->verifyRoutes();