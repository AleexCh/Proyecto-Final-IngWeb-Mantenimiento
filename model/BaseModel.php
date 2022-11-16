<?php

namespace Model;

class BaseModel
{
    protected static $database;
    protected static string $table = "";
    protected static array $columnsDB = [];
    protected static array $alerts = [];
    protected static string $error = "";

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

    public function cleanData(): array
    {
        $attributes = $this->attributes();
        $sanitize = [];
        foreach($attributes as $key => $value)
        {
            $sanitize[$key] = self::$database->escape_string($value);
        }

        return $sanitize;
    }

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

    public static function findAll(): array
    {
        $query = "SELECT * FROM " . static::$table;
        return self::querySQL($query);
    }

    public static function findById($id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id = ${id}";
        $result = self::querySQL($query);
        return array_shift($result);
    }

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

    public static function findAllWhere($columna, $valor): array
    {
        $query = "SELECT * FROM " . static::$table . " WHERE ${columna} = '${valor}'";
        return self::querySQL($query);
    }

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

    public function update(): array
    {
        $attributes = $this->cleanData();
        $values = [];
        foreach($attributes as $key => $value)
        {
            $values[] = "{$key}='{$value}'";
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

    public function delete()
    {
        $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$database->escape_string($this->id) . " LIMIT 1";
        return self::$database->query($query);
    }
}