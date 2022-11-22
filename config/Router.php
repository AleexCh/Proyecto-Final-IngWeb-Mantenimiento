<?php

namespace App;

//Esta es la clase router que maneja las rutas se pueden decir que se lo encontraron en un video porque
//no se como explicarlo exactamente

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn): void
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn): void
    {
        $this->postRoutes[$url] = $fn;
    }

    public function verifyRoutes(): void
    {
        $actualUrl = $_SERVER["PATH_INFO"] ?? "/";
        $method = $_SERVER["REQUEST_METHOD"];

        if($method === "GET")
        {
            $fn = $this->getRoutes[$actualUrl] ?? null;
        }

        else
        {
            $fn = $this->postRoutes[$actualUrl] ?? null;
        }

        if($fn)
        {
            call_user_func($fn, $this);
        }

        else
        {
            echo "Not Found";
        }
    }

    public function render($view, $layout, $data = []) : void
    {
        foreach ($data as $key => $value)
        {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "./../views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . "./../views/layout/$layout.php";
    }
}