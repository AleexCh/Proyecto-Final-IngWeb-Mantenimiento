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
        Auth::authorizate();
        self::renderIndex($router, null);
    }

    public static function getUpdateGame(Router $router) : void
    {
        Auth::authorizate();

        $id = $_GET["id"];
        if(!isset($id)) {
            header("Location: /admin/partidos");
        }

        self::renderUpdateGame($router, null, $id);
    }

    public static function postUpdateGame(Router $router) : void
    {
        Auth::authorizate();

        $id = $_GET["id"];
        if(!isset($id)) {
            header("Location: /admin/partidos");
        }

        $gameToUpdate = Games::findById(htmlspecialchars($_GET["id"]));
        if (!isset($gameToUpdate)) {
            header("Location: /admin/partidos");
        }
        
        if (isset($_POST["first_team"])) {
            $gameToUpdate->first_team = (int)$_POST["first_team"];
        }

        if (isset($_POST["second_team"])) {
            $gameToUpdate->second_team =(int)$_POST["second_team"];
        }  

        if (isset($_POST["first_team_goals"])){
            $gameToUpdate->first_team_goals = $_POST["first_team_goals"];
        }

        if (isset($_POST["second_team_goals"])) {
            $gameToUpdate->second_team_goals = $_POST["second_team_goals"];
        }

        if (isset($_POST["play_date"])) {
            $gameToUpdate->play_date = $_POST["play_date"];
        }

        $gameSaved = $gameToUpdate->save();
        
        $teamsToUpdate = Teams::findAllpositionForGames();
        foreach ($teamsToUpdate as $team){
            $teamToUpdate = new Teams ();
            $teamToUpdate->id = $team->id;
            $teamToUpdate->country = $team->country;
            $teamToUpdate->group = $team->group;
            $teamToUpdate->win = $team->win;
            $teamToUpdate->draw = $team->draw;
            $teamToUpdate->loss = $team->loss;
            $teamToUpdate->goals_favor = $team->goals_favor;
            $teamToUpdate->goals_againts = $team->goals_againts;
            $teamToUpdate->save();
        }
        if ($gameSaved &&$teamToUpdate) {
            header("Location: /admin/partidos");
        }
        die();
    }

    public static function getAdminTeams(Router $router) : void
    {
        Auth::authorizate();
        self::renderAdminTeams($router, null);
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
            "active" => "games"
        ]);
    }

    private static function renderAdminTeams($router, string | null $error) : void
    {
        $teams = Teams::findAll();
        $router->render("pages/admin/teams", "index", [
            "background" => "",
            "teams" => $teams,
            "active" => "teams"
        ]);
    }

    private static function renderUpdateGame($router, string | null $error, int $id) : void
    {
        $teams = Teams::findAll();
        $game = Games::findById($id);
        if (!isset($game)) {
            header("Location: /admin/partidos");
        }

        $router->render("pages/admin/update", "index", [
            "background" => "",
            "error" => $error,
            "teams" => $teams,
            "game" => $game
        ]);
    }
}