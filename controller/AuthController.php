<?php

namespace Controller;

use App\Router;
use Model\User;

class AuthController
{
    public static function getRegister(Router $router) : void
    {
        self::renderCreateUser($router, [], null);
    }

    public static function postRegister(Router $router) : void
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $userToCreate = new User($_POST);
            $valid = $userToCreate->validateCreateUser();
            self::valid($valid, "register", $router);

            if(User::findWhere("email", $userToCreate->email)) {
                self::renderCreateUser($router, [], "El correo ya está registrado");
                die();
            }

            $userToCreate->hashPassword();
            $userToCreate->save();
        }
    }

    public static function getRecoverAccount(Router $router) : void
    {
        self::renderRecoverAccount($router, [], null);
    }

    public static function postRecoverAccount(Router $router) : void
    {
        $valid = User::validateEmail($_POST["email"]);
        self::valid($valid, "recover", $router);

        $userToRecover = User::findWhere("email", $_POST["email"]);
        if(!$userToRecover) {
            self::renderRecoverAccount($router, [], "El correo no está registrado");
            die();
        }

        //Enviar email al correo
    }

    public static function getChangePassword(Router $router) : void
    {
        self::renderChangePassword($router, [], null);
    }

    public static function postChangePassword(Router $router) : void
    {

    }

    public static function getLogin(Router $router) : void
    {
        self::renderLogin($router,  [], null);
    }

    public static function postLogin(Router $router) : void
    {
        $valid = User::validateLogin($_POST["email"], $_POST["password"]);
        self::valid($valid, "login", $router);

        $userToLogin = User::findWhere("email", $_POST["email"]);

        if(!$userToLogin) {
            self::valid("El correo no está registrado", "login", $router);
            die();
        }

        $valid = $userToLogin->passwordVerify($_POST["password"]);
        self::valid($valid, "login", $router);

        session_start();
        $_SESSION["user_id"] = $userToLogin->id;
        $_SESSION["user_email"] = $userToLogin->email;
        $_SESSION["user_name"] = $userToLogin->first_name . " " . $userToLogin->last_name;

        if($userToLogin->is_admin) {
            $_SESSION["is_admin"] = true;
            echo "<pre>";
            echo var_dump($_SESSION);
//            header("redirect: /admin");
            echo "</pre>";
            die();
        }

        $_SESSION["is_admin"] = false;
        echo "<pre>";
        echo var_dump($_SESSION);
        echo "</pre>";
//        header("redirect: /");
        die();
    }

    private static function renderCreateUser($router, array $attributes, string | null $error) : void
    {
        $router->render("pages/auth/register", "index", [
            "background" => "",
            "error" => $error
        ]);
    }

    private static function renderRecoverAccount($router, array $attributes, string | null $error) : void
    {
        $router->render("pages/auth/recover", "index", [
            "background" => "",
            "error" => $error
        ]);
    }

    private static function renderChangePassword($router, array $attributes, string | null $error) : void
    {
        $router->render("pages/auth/change-password", "index", [
            "background" => "",
            "error" => $error
        ]);
    }

    private static function renderLogin($router, array $attributes, string | null $error) : void
    {
        $router->render("pages/auth/login", "index", [
            "background" => "",
            "error" => $error
        ]);
    }

    //Creo que se puede eliminar y retornar directo
    private static function valid(string | null $toValid, string $render, $router) : void
    {
        if($toValid != null && $render == "login") {
            self::renderLogin($router, [], $toValid);
            die();
        }

        else if($toValid != null && $render == "register") {
            self::renderCreateUser($router, [], $toValid);
            die();
        }

        else if($toValid != null && $render == "recover") {
            self::renderRecoverAccount($router, [], $toValid);
            die();
        }
    }
}