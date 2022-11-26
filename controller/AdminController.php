<?php

namespace Controller;

use App\Router;
use Middle\Auth;
use Model\Games;
use Model\Teams;

class AdminController
{
    public static function getIndex(Router $router) : void
    {
        Auth::authenticate();
        Auth::authorizate();
        self::renderIndex($router, null);
    }

    public static function getUpdateGame(Router $router) : void
    {
        Auth::authenticate();
        Auth::authorizate();

        $id = $_GET["id"];
        self::renderUpdateGame($router, null, $id);
    }

    public static function postUpdateGame(Router $router) : void
    {

    }

    private static function renderIndex($router, string | null $error) : void
    {
        $games = Games::findAll();
        $teams = Teams::findAll();

        $router->render("pages/admin/index", "index", [
            "background" => "",
            "error" => $error,
            "teams" => $teams,
            "games" => $games,
            "active" => "dashboard"
        ]);
    }

    private static function renderUpdateGame($router, string | null $error, int $id) : void
    {
        $teams = Teams::findAll();
        $game = Games::findById($id);
        $router->render("pages/admin/update", "index", [
            "background" => "",
            "error" => $error,
            "teams" => $teams,
            "game" => $game
        ]);
    }
}