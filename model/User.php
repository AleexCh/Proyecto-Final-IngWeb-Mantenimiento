<?php

namespace Model;

class User extends BaseModel
{
    protected static string $table = "users";
    protected static array $columnsDB = ["id", "first_name", "last_name", "email", "password", "recover_token", "is_admin"];

    public int | null $id;
    public string | null $first_name;
    public string | null $last_name;
    public string | null $email;
    public string | null $password;
    public string | null $repeat_password;
    public string | null $recover_token;
    public int $is_admin;

    public function __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->first_name = ($args["first_name"] ?? null);
        $this->last_name = ($args["last_name"] ?? null);
        $this->email = ($args["email"] ?? null);
        $this->password = ($args["password"] ?? null);
        $this->repeat_password = ($args["repeat_password"] ?? null);
        $this->recover_token = null;
        $this->is_admin = 0;
    }

    public function validateCreateUser() : string | null
    {
        if (empty($this->first_name) || empty($this->last_name) || empty($this->email) || empty($this->password) || empty($this->repeat_password)) {
            return self::$error = "Debe llenar todos los campos";
        }

        else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return self::$error = "El email no tiene un formato válido";
        }

        else if(strlen($this->password) < 8) {
            return self::$error = "La contraseña debe tener minimo 8 caracteres";
        }

        else if($this->password != $this->repeat_password) {
            return self::$error = "Las contraseñas no coinciden";
        }

        unlink($this->repeat_password);
        return null;
    }

    public function validateChangePassword() : string | null
    {
        if ($this->password === null || $this->repeat_password === null) {
            return self::$error = "Debe llenar todos los campos";
        }

        if(strlen($this->password) < 8) {
            return self::$error = "La contraseña debe tener minimo 8 caracteres";
        }

        if($this->password != $this->repeat_password) {
            return self::$error = "Las contraseñas no coinciden";
        }

        unlink($this->repeat_password);
        return null;
    }

    public function hashPassword() : void
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function passwordVerify($passwordToCompare) : string | null
    {
        $verify = password_verify($passwordToCompare, $this->password);
        if(!$verify) {
            return self::$error = "El password es incorrecto";
        }

        return null;
    }

    public static function validateEmail(string $email) : string | null {
        if(empty($email)) {
            return self::$error = "Debe ingresar su correo";
        }

        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return self::$error = "El correo no tiene un formato valido";
        }

        return null;
    }

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