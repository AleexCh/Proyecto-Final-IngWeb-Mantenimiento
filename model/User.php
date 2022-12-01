<?php

namespace Model;

class User extends BaseModel //Extendemos de baseModel esto nos ofrece las funciones creadas ya de base y podemos añadir mas funciones
{
    protected static string $table = "users"; //Seteamos el nombre de la tabla
    protected static array $columnsDB = ["id", "first_name", "last_name", "email", "password", "is_admin"]; //Seteamos las columnas de la base de datos esto debe ir tal cual

    //Los atributos de nuestra clase, nombrados igual a los atributos de la base de datos, en el caso de añadir mas pre guardar en la base de datos hacemos un unlink a cada uno de estos que son extra
    public int | null $id;
    public string | null $first_name;
    public string | null $last_name;
    public string | null $email;
    public string | null $password;
    public int $is_admin;

    //constructor de nuestra clase
    public function __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->first_name = ($args["first_name"] ?? null);
        $this->last_name = ($args["last_name"] ?? null);
        $this->email = ($args["email"] ?? null);
        $this->password = ($args["password"] ?? null);
        $this->repeat_password = ($args["repeat_password"] ?? null);
        $this->is_admin = 0;
    }

    //Clase que valida la creacion de los usuarios
    public function validateCreateUser() : string | null
    {
        //Revisa que todos los campos esten llenos si hay alguno que sea nulo, retorna error
        //El metodo de php empty revisa que no haya espacio vacio como texto es decir pasar esto "  " no es nulo pero tampoco es un dato
        if (empty($this->first_name) || empty($this->last_name) || empty($this->email) || empty($this->password) || empty($this->repeat_password)) {
            return self::$error = "Debe llenar todos los campos";
        }

        //Utiliza el metodo de filtrado de php en este caso revismaos si es un email o no
        else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return self::$error = "El email no tiene un formato válido";
        }

        //revisamos que el pasword tenga como minimo 8 caracteres
        else if(strlen($this->password) < 8) {
            return self::$error = "La contraseña debe tener minimo 8 caracteres";
        }

        //Revisamos que la validacion de ambas passwords sean iguales
        else if($this->password != $this->repeat_password) {
            return self::$error = "Las contraseñas no coinciden";
        }

        //quitamos el repetir password de nuestro objeto
        unset($this->repeat_password);
        return null;
    }

    //Funcion par cifrar los passwords
    public function hashPassword() : void
    {
        //utilizamos el metodo password_hash de php le pasamos como primer parametro el password que queremos hashear y como segundo un algoritmo de hasheo
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    //Como nuestro algoritmo esta hasheado debemos utilizar el metodo de password_verify para comprobar los passwords, primero recibe el password hasheado y segundo el que
    //queremos comprobar, se utiliza en el login por lo cual el segundo parametro es el de nuestro formulario de login
    public function passwordVerify($passwordToCompare) : string | null
    {
        $verify = password_verify($passwordToCompare, $this->password);
        if(!$verify) {
            return self::$error = "El password es incorrecto";
        }

        return null;
    }

    //Funcion para validar los campos del login
    public static function validateLogin(string $email, string $password) : string | null
    {
        if (empty($email) || empty($password)) {
            return self::$error = "Debe llenar todos los campos";
        }

        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return self::$error = "El email no tiene un formato válido";
        }

        return null;
    }
}