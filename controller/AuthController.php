<?php

//En esta clase vemos todos los metodos de login y crear cuenta, los metodos get solo renderizan la vista
//Los metodos post es al hacer una peticion post a la url que este definida

namespace Controller;

use App\Router;
use Model\User;

class AuthController
{
    public static function getRegister(Router $router) : void
    {
        session_start();
        if(!$_SESSION){
                     self::renderCreateUser($router, null);
        }
        else{
            header("Location: /");
        }
    }

    public static function postRegister(Router $router) : void
    {
        /*
         * 1. Comprueba que el metodo sea post
         * 2. Instancia el modelo de usuario y se le pasa como argumento el $_POST
         * 3. valida con el metodo establecido de create user y con el metodo de self valid retorna el mensaje de error en caso de haberlo, esto igual se puede mejora
         */

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $userToCreate = new User($_POST);
            $valid = $userToCreate->validateCreateUser();
            self::valid($valid, "register", $router);

            //4. en este punto no hay errores la validacion paso correctamente por lo cual revisamos si el correo ya esta registrado, simplemente hacemos una consulta
            // con el correo como parametro si devuelve algo es porque si esta registrado y renderizamos el error;
            //El metodo die() es para cortar la conexion es como un return
            if(User::findWhere("email", $userToCreate->email)) {
                self::renderCreateUser($router, "El correo ya está registrado");
                die();
            }

            //En este punto ya no hay ninguna cosa que validar, las ha pasado tdas por lo cual podemos guardar el nuevo usuario pero antes una buena practica al crear
            //usuarios con contraseñas es cifrar las contraseñas el metodo hashPassword es un metodo que esta en el modelo que usa una funcion de php para cifrar las
            //contraseñas y luego se guarda :v
            $userToCreate->hashPassword();
            $userToCreate->save();
            self::postLogin($router);
        }
    }

    public static function getLogin(Router $router) : void
    {   
        session_start();
        if(!$_SESSION){
                    self::renderLogin($router, null);
        }
        else{
            header("Location: /");
        }
    }

    public static function postLogin(Router $router) : void
    {
        //Aqui lo que hacemos es no instancio el modelo sino que tengo un metodo estatico que valida los campos del login, le pasamos primero el email y luego el password
        //Se lo pasamos al metodo de valid si hay algun error retorna el error sino ps continua su flujo normal
        $valid = User::validateLogin($_POST["email"], $_POST["password"]);
        self::valid($valid, "login", $router);

        //Continua aca si no hay error por lo cual procedemos a revisar si el email que nos pasaron esta registrado, si no esta registrado vamos a retornar un error
        //diciendo que el correo no esta registrado y corta, se corta la ejecucion para que no continue ejecutando el resto del codigo
        $userToLogin = User::findWhere("email", $_POST["email"]);
        if(!$userToLogin) {
            self::valid("El correo no está registrado", "login", $router);
            die();
        }

        //Aqui ahora hacemos una comprobacion de password al metodo passwordVerify debido a que ciframos las contraseñas debemos hacer uso de una funcion de php para que las
        //Compare en este punto estamos usando el modelo que del email cuando lo buscamos en la lina 61
        //cuando comprueba las contraseñas retornara un mensaje o un nulo se lo pasamos a la funcion valid si esta ve que el valor es difeente de nulo sigue su flujo normal
        //Si tiene algo retorna el error
        $valid = $userToLogin->passwordVerify($_POST["password"]);
        self::valid($valid, "login", $router);


        //Aqui ya hemos validado que el usuario exista y que la contraseña sea valida por lo cual podemos crear la sesion
        //Seteamos el objeto $_SESSION con diferentes cosas de utilidad como el id, el email y el nombre y tambien atributos para validar las paginas como el is_auth y is_admin
        session_start();
        $_SESSION["user_id"] = $userToLogin->id;
        $_SESSION["user_email"] = $userToLogin->email;
        $_SESSION["user_name"] = $userToLogin->first_name . " " . $userToLogin->last_name;
        $_SESSION["is_auth"] = true;


        //Si el objeto de usuario recuperado en la linea 61 tiene el atributo is_admin como true quiere decir que es un administrador y por lo tanto seteamos ese attributo en
        //el arreglo de $_SESSION y retornamos a la pagina de /admin y cortamos
        if($userToLogin->is_admin) {
            $_SESSION["is_admin"] = true;
            header("Location: /admin/partidos");
            die();
        }

        //De otra forma quiere decir que el atributo is_admin del objeto de la linea 61 es false por lo cual no es administrador seteamos y lo retornamos a la pagina principal
        $_SESSION["is_admin"] = false;
        header("Location: /");
        die();
    }

    public static function logout() : void
    {
        session_start();
        $_SESSION = [];
        header("Location: /login");
    }


    //Los render son una metodos privados establecidos para no repetir el codigo de renderizar una vista
    // se le pasa el router, un arreglo de atributos
    // mensaje de error el cual tambien podria ir dentro de los attributos
    private static function renderCreateUser($router, string | null $error) : void
    {
        $router->render("pages/auth/register", "index", [
            "background" => "bg-auth",
            "error" => $error
        ]);
    }

    private static function renderLogin($router, string | null $error) : void
    {
        $router->render("pages/auth/login", "index", [
            "background" => "bg-auth",
            "error" => $error
        ]);
    }

    //Creo que se puede eliminar y retornar directo
    private static function valid(string | null $toValid, string $render, $router) : void
    {
        if($toValid != null && $render == "login") {
            self::renderLogin($router, $toValid);
            die();
        }

        else if($toValid != null && $render == "register") {
            self::renderCreateUser($router, $toValid);
            die();
        }
    }
}