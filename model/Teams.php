<?php

namespace Model;

class Teams extends BaseModel
{
    protected static string $table = "teams";
    protected static array $columnsDB = ["id", "country", "group"];

    public int | null $id;
    public string | null $country;
    public string | null $group;

    public function __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->country = ($args["country"] ?? null);
        $this->group = ($args["group"] ?? null);
    }
}