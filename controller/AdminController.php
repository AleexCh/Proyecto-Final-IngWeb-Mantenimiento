<?php

namespace Controller;

use http\Client;
use Middle\Auth;

class AdminController
{
    public static function index() {
        Auth::authenticate();
        Auth::authorizate();
        echo "index de admin";
    }
}