<?php

namespace Controller;

use App\Router;
use Middle\Auth;
use Model\Fase;
use Model\Favorites;
use Model\Games;
use Model\Teams;

class PagesController
{
    public static function index(Router $router): void
    {
        $router->render("index", "index");
    }

    public static function apiGetTeams() : void
    {
        $teams = Teams::findAll();
        echo json_encode($teams);
    }

    public static function apiGetTeam() : void
    {
        $id = htmlspecialchars($_GET["id"]);
        if (!$id) {
            echo json_encode("No se ha proporcionado ningun parametro id");
        }

        $team = Teams::findById(htmlspecialchars($id));
        echo json_encode($team);
    }

    public static function apiGetGames() : void
    {
        $games = Games::findAll();
        echo json_encode($games);
    }

    public static function apiGetFases() : void
    {
        $fases = Fase::findAll();
        echo json_encode($fases);
    }

    public static function apiGetFavorites() : void
    {
        session_start();
        Auth::authenticate();
        $favorites = Favorites::findAllWhere("user_id", $_SESSION["user_id"]);
        $list = [];

        foreach ($favorites as $favorite) {
            $data = Teams::findById($favorite->team_id);
            $list[] = $data;
        }

        echo json_encode($list);
    }

    public static function apiNewFavorite() : void
    {
        session_start();
        Auth::authenticate();
        $id = $_GET["id"];
        if(!$id) {
            echo "<pre>";
            echo "Falta el id";
            echo "</pre>";
            die();
        }

        if(!Teams::findById($id)) {
            echo "<pre>";
            echo "No se encontro al partido";
            echo "</pre>";
            die();
        }

        $newFavorite = new Favorites();
        $newFavorite->team_id = $id;
        $newFavorite->user_id = $_SESSION["user_id"];
        $newFavorite->save();

        echo json_encode("favorito añadido");
    }
}