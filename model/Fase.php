<?php

namespace Model;

class Fase extends BaseModel
{
    protected static string $table = "fase";
    protected static array $columnsDB = ["id", "name"];

    public int | null $id;
    public string | null $name;

    public function  __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->name = ($args["name"] ?? null);
    }
}