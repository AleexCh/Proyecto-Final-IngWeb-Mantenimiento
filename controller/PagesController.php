<?php

namespace Controller;

use App\Router;
use Middle\Auth;
use Model\Fase;
use Model\Favorites;
use Model\Games;
use Model\Players;
use Model\Teams;

class PagesController
{
    public static function index(Router $router): void
    {
        $router->render("index", "index");
    }

    public static function getTeam(Router $router) : void
    {
        $id = htmlspecialchars($_GET["id"]);
        if(!$id) {
            echo "<pre>";
            echo "falta el id";
            echo "</pre>";
            exit();
        }

        $teams = Teams::findAll();
        $team = Teams::findById($id);
        if(!$team) {
            echo "<pre>";
            echo "No se encontro";
            echo "</pre>";
            exit();
        }

        $players = Players::findAllWhere("team_id", $team->id);
        $games = Games::findAll();

        session_start();
        if($_SESSION["is_auth"]) {
            $favorites = Favorites::findAllWhere("user_id", $_SESSION["user_id"]);
            $router->render("pages/team", "index", [
                "background" => "bg_teams",
                "teams" => $teams,
                "equipo" => $team,
                "games" => $games,
                "players" => $players,
                "favorites" => $favorites
            ]);
            die();
        }

        $router->render("pages/team", "index", [
            "background" => "bg_teams",
            "teams" => $teams,
            "equipo" => $team,
            "games" => $games,
            "players" => $players
        ]);
        die();
    }

    public static function getPosiciones(Router $router) : void
    {
        $teams = Teams::findAll();
        $router->render("pages/posiciones", "index", [
            "teams" => $teams
        ]);
    }

    public static function getFavoritesPage(Router $router) : void
    {
        session_start();
        if($_SESSION["is_auth"]) {
            $favorites = Favorites::findAllWhere("user_id", $_SESSION["user_id"]);
            $teams = Teams::findAll();
            $games = Games::findAll();

            $router->render("pages/favorites", "index", [
                "background" => "bg_teams",
                "favorites" => $favorites,
                "games" => $games,
                "teams" => $teams
            ]);
            die();
        }
    }

    public static function getResultadosPage(Router $router) : void
    {
        $date = $_GET["date"];
        if(!$date) {
            $date = date("Y-n-d");
        }

        $games = Games::findAll("play_date", $date);
        $router->render("pages/resultados", "index", [
            "background" => "bg_teams",
            "games" => $games
        ]);
    }


    //API
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
            echo json_encode(false);
            die();
        }

        if(!Teams::findById($id)) {
            echo json_encode(false);
            die();
        }

        $newFavorite = new Favorites();
        $newFavorite->team_id = $id;
        $newFavorite->user_id = $_SESSION["user_id"];
        $newFavorite->save();

        echo json_encode(true);
    }
}