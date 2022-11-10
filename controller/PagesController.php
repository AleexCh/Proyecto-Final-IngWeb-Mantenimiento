<?php

namespace Controller;

use App\Router;

class PagesController
{
    public static function index(Router $router): void
    {
        $router->render("index", "index");
    }

    public static function teams(Router $router) : void
    {
        $router->render("teams", "index", ["background" => "background-teams"]);
    }
}