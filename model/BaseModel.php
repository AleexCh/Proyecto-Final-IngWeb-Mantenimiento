<?php

namespace Model;

//Aca hay muchas cosas que explicar

class BaseModel
{
    //primero los atributos de mi clase son la base de datos, la tabla que queremos utilizar
    //un arreglo de alertas que creo que no se usa en este ejemplo
    //un mensaje de error este si se usa
    //algunas cosas igual no se usen porque esto esta reutilizado :v
    //Este modelo no se instancia sino que se extiende a otras clases modelo como usuarios, equipos, etc

    protected static $database;
    protected static string $table = "";
    protected static array $columnsDB = [];
    protected static array $alerts = [];
    protected static string $error = "";

    //Este es el metodo para setear la base de datos el cual lo hicimos en config/app.php
    public static function setDB($database): void
    {
        self::$database = $database;
    }

    public static function setError($message): void
    {
        static::$error = $message;
    }

    public static function getError(): string
    {
        return self::$error;
    }

    //este junto con otros mas son para el manejo de las consultas a la base de datos
    public static function querySQL($query): array
    {
        $array = [];
        $result = self::$database->query($query);

        while($data = $result->fetch_assoc())
        {
            $array[] = static::createObject($data);
        }

        $result->free();
        return $array;
    }

    //Para el manejo de las consultas de base de datos
    protected static function createObject($data): static
    {
        $object = new static;

        foreach($data as $key => $value)
        {
            if(property_exists($object, $key))
            {
                $object->$key =$value;
            }
        }

        return $object;
    }

    //Para el manejo de consulta de base de datos
    public function attributes(): array
    {
        $attributes = [];
        foreach(static::$columnsDB as $column)
        {
            if($column === "id") continue;
            $attributes[$column] = $this->$column;
        }

        return $attributes;
    }

    //Esto es para sanitizar los datos que llegan y evitar que hagan ataques de inyecciones SQL
    public function cleanData(): array
    {
        $attributes = $this->attributes();
        $sanitize = [];
        foreach($attributes as $key => $value)
        {
            if($value != null) {
                $sanitize[$key] = self::$database->escape_string($value);
            }

            $sanitize = $attributes;
        }

        return $sanitize;
    }

    //Creo que no se usa :v
    public function sync($args=[]): void
    {
        foreach($args as $key => $value)
        {
            if(property_exists($this, $key) && !is_null($value))
            {
                $this->$key = $value;
            }
        }
    }

    //Metodo para crear una consulta de todos los registros de una tabla
    public static function findAll(): array
    {
        $query = "SELECT * FROM " . static::$table;
        return self::querySQL($query);
    }

    //Metodo para crear un registro en especifico de una tabla, se busc apor Id
    public static function findById($id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id = ${id}";
        $result = self::querySQL($query);
        return array_shift($result);
    }

    //Metodo para hacer un where se le pasa una columna y un valor, solo retorna un objeto
    public static function findWhere($column, $valor)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE ${column} = '${valor}'";
        $result = self::querySQL($query);
        if($result)
        {
            return array_shift($result);
        }

        return $result;
    }

    //Lo mismo que el anterior pero retorna varios
    public static function findAllWhere($columna, $valor): array
    {
        $query = "SELECT * FROM " . static::$table . " WHERE ${columna} = '${valor}'";
        return self::querySQL($query);
    }

    //Para guardar el el objeto en la base de datos
    public function save(): array
    {
        $result = "";
        if(!is_null($this->id))
        {
            $result = $this->update();
        } else {
            $result = $this->create();
        }

        return $result;
    }

    //Implementacion en la funcion save en este caso crea
    public function create(): array
    {
        $attributes = $this->cleanData();
        $query = "INSERT INTO " . static::$table . " (";
        $query .= join(', ', array_keys($attributes));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($attributes));
        $query .= "')";
        $result = self::$database->query($query);
        return [
            "result" => $result,
            "id" => self::$database->insert_id
        ];
    }

    //Implementacion en el save enn este caso es para actualizar, se le debe pasar un id
    public function update(): array
    {
        $attributes = $this->cleanData();
        $values = [];
        foreach($attributes as $key => $value)
        {
            if($value != null) {
                $values[] = "{$key}='{$value}'";
            } else {
                $values[] = "{$key}=null";
            }
        }

        $query = "UPDATE " . static::$table ." SET ";
        $query .=  join(', ', $values );
        $query .= " WHERE id = '" . self::$database->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $result = self::$database->query($query);
        return [
            "result" => $result,
            "id" => self::$database->insert_id
        ];
    }

    //funcion para eliminar un objeto de la base de datos
    public function delete()
    {
        $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$database->escape_string($this->id) . " LIMIT 1";
        return self::$database->query($query);
    }
}