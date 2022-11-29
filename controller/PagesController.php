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
        if(!isset($_GET["id"])) {
            echo "<pre>";
            echo "falta el id";
            echo "</pre>";
            exit();
        }
        
        $id = htmlspecialchars($_GET["id"]);
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
        if(isset($_SESSION["is_auth"])) {
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
            "players" => $players,
        ]);
        die();
    }

    public static function getPosiciones(Router $router) : void
    {
        session_start();
        $teams = Teams::findAll();
        $router->render("pages/posiciones", "index", [
            "background" => "bg_teams",
            "teams" => $teams
        ]);
    }

    public static function getFavoritesPage(Router $router) : void
    {
        Auth::authenticate();

        if($_SESSION["is_auth"]) {
            $favorites = Favorites::findAllWhere("user_id", $_SESSION["user_id"]);
            $teams = Teams::findAll();
            $games = Games::findAll();

            $router->render("pages/favorites", "index", [
                "background" => "bg_teams",
                "favorites" => $favorites,
                "games" => $games,
                "teams" => $teams,
            ]);
            die();
        }
    }

    public static function getResultadosPage(Router $router) : void
    {
        $date = date("Y-n-d");

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $date = $_POST["play_date"];
        }

        $teams = Teams::findAll();
        $games = Games::findAllWhereBetween("play_date", $date, "00:00:00", "23:59:00");
        $router->render("pages/resultados", "index", [
            "background" => "bg_teams",
            "date" => $date,
            "games" => $games,
            "teams" => $teams,
        ]);
    }

    public static function getClasif(Router $router) : void
    {
        $octavos = Games::findAllWhere("fase_id", "2");
        $cuartos = Games::findAllWhere("fase_id", "3");
        $semis = Games::findAllWhere("fase_id", "4");
        $final = Games::findAllWhere("fase_id", "5");
        $teams = Teams::findAll();

        $router->render("pages/clasif", "index", [
            "background" => "bg_teams",
            "octavos" => $octavos,
            "cuartos" => $cuartos,
            "semis" => $semis,
            "final" => $final,
            "teams" => $teams
        ]);
    }


    //API
    public static function apis(Router $router) : void
    {
        $apis = ["/api/equipos", "/api/equipo", "/api/partidos", "/api/fases", "/api/favoritos"];
        $router->render("pages/apis", "index", [
            "background" => "bg_teams",
            "apis" => $apis
        ]);
    }

    public static function apiGetTeams() : void
    {
        $teams = Teams::findAll();
        echo json_encode($teams);
    }

    public static function apiGetTeam() : void
    {
        if(!isset($_GET["id"])) {
            echo json_encode("No se ha proporcionado ningun parametro id");
        }
        else{
            $id = htmlspecialchars($_GET["id"]);
            $team = Teams::findById(htmlspecialchars($id));
            echo json_encode($team);
        }
        
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

    public static function apiDeleteFavorite() : void
    {
        session_start();
        Auth::authenticate();
        $id = $_GET["id"];
        if(!$id) {
            echo json_encode(false);
            die();
        }

        $favorite = Favorites::findById($id);
        if(!$favorite) {
            echo json_encode(false);
            die();
        }

        $favorite->delete();
        echo json_encode(true);
        die();
    }
}