<?php

namespace Controller;

use App\Router;
use Middle\Auth;
use Model\Fase;
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
        $gameToUpdate = Games::findById(htmlspecialchars($_GET["id"]));
        if (!$gameToUpdate) {
            echo "<pre>";
            echo "No se encontro al partido";
            echo "</pre>";
            die();
        }

        if(isset($_POST["first_team"]) && empty($_POST["first_team"])) {
            $gameToUpdate->first_team = null;
        } else if (isset($_POST["first_team"]) && $gameToUpdate->first_team != $_POST["first_team"]) {
            $gameToUpdate->first_team = $_POST["first_team"];
        }

        if(isset($_POST["second_team"]) && empty($_POST["second_team"])) {
            $gameToUpdate->second_team = null;
        } else if (isset($_POST["second_team"]) && $gameToUpdate->second_team != $_POST["second_team"]) {
            $gameToUpdate->second_team = $_POST["second_team"];
        }

        if(isset($_POST["first_team_goals"]) && empty($_POST["first_team_goals"])) {
            $gameToUpdate->first_team_goals = null;
        } else if (isset($_POST["first_team_goals"])  && $gameToUpdate->first_team_goals != $_POST["first_team_goals"]) {
            $gameToUpdate->first_team_goals = $_POST["first_team_goals"];
        }

        if(isset($_POST["second_team_goals"]) && empty($_POST["second_team_goals"])) {
            $gameToUpdate->second_team_goals = null;
        } else if (isset($_POST["second_team_goals"]) && $gameToUpdate->second_team_goals != $_POST["second_team_goals"]) {
            $gameToUpdate->second_team_goals = $_POST["second_team_goals"];
        }

        if (isset($_POST["play_date"]) && !empty($_POST["play_date"]) && $gameToUpdate->play_date != $_POST["play_date"]) {
            $gameToUpdate->play_date = $_POST["play_date"];
        }

        $gameSaved = $gameToUpdate->save();
        if ($gameSaved) {
            header("Location: /admin");
        }
        die();
    }

    private static function renderIndex($router, string | null $error) : void
    {
        $games = Games::findAll();
        $teams = Teams::findAll();
        $fase = Fase::findAll();

        $router->render("pages/admin/index", "index", [
            "background" => "",
            "error" => $error,
            "teams" => $teams,
            "games" => $games,
            "fase" => $fase,
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