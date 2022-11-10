<?php

namespace Router;

use App\Router;
use Controller\PagesController;

$router = new Router();

$router->get("/", [PagesController::class, "index"]);
$router->get("/equipos", [PagesController::class, "teams"]);

$router->verifyRoutes();