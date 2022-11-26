<?php

//En el router definimos todas las url de nuestra aplicacion

namespace Router;

use App\Router;
use Controller\AdminController;
use Controller\AuthController;
use Controller\PagesController;

// instanciamos la clase de Router
$router = new Router();

//Auth Routes

//Para cada ruta primro definimos que metodo utilizara el router si es get para las rutas de tipo get o post para las rutas de tipo post, luego el path de la url con la cual
//se identificara por ejemplo localhost/{path} y por ultimo le pasamos la clase y metodo que ejecutara esta clase en los controladores
$router->get("/registrar", [AuthController::class, "getRegister"]);
$router->post("/registrar", [AuthController::class, "postRegister"]);

$router->get("/login", [AuthController::class, "getLogin"]);
$router->post("/login", [AuthController::class, "postLogin"]);

$router->get("/recuperar-cuenta", [AuthController::class, "getRecoverAccount"]);
$router->post("/recuperar-cuenta", [AuthController::class, "postRecoverAccount"]);

$router->get("/cambiar-contraseña", [AuthController::class, "getChangePassword"]);
$router->post("/cambiar-contraseña", [AuthController::class, "postChangePassword"]);

$router->get("/logout", [AuthController::class, "logout"]);

//Public Routes
$router->get("/", [PagesController::class, "index"]);
$router->get("/api/equipos", [PagesController::class, "apiGetTeams"]);
$router->get("/api/equipo", [PagesController::class, "apiGetTeam"]);
$router->get("/api/partidos", [PagesController::class, "apiGetGames"]);
$router->get("/api/fases", [PagesController::class, "apiGetFases"]);
$router->get("/api/favoritos", [PagesController::class, "apiGetFavorites"]);
$router->get("/api/add-favoritos", [PagesController::class, "apiNewFavorite"]);

//Admin Routes
$router->get("/admin", [AdminController::class, "getIndex"]);
$router->get("/editar-partido", [AdminController::class, "getUpdateGame"]);
$router->post("/editar-partido", [AdminController::class, "postUpdateGame"]);

$router->verifyRoutes();