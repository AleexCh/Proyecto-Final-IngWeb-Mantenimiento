<?php

/* Esta es una clase de ayuda en cada metodo privado, se refiere privado a los metodos de una ruta para la cual se
requiere autenticacion

En esta clase hay 2 metodos el primero autentica que este is_auth en el arreglo de $_SESSION este se setea en el login
el segundo comprueba que este el is_admin el cual tambien se setea en el login solo para el admin
*/

namespace Middle;

class Auth
{
    public static function authenticate() : void {
        //Si is_auth no esta presente o es falso siempre redirige al login

        session_start();
        if(!$_SESSION["is_auth"]) {
            header("Location: /login");
        }
    }

    public static function authorizate() : void {
        //Si el is_admin no esta presente o es falso siempre redirige al login

        session_start();
        if(!$_SESSION["is_admin"]) {
            header("Location: /login");
        }
    }

    //En ambos casos si no cae en el if continua su curso normal de ejecucion
}