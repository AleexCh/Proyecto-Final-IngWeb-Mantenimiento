<?php

namespace Model;

class Teams extends BaseModel
{
    protected static string $table = "teams";
    protected static array $columnsDB = ["id", "country", "group"];

    public int | null $id;
    public string | null $country;
    public string | null $group;
    public string | null $win;
    public string | null $draw;
    public string | null $loss;
    public string | null $goals_favor;
    public string | null $goals_againts;

    public function __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->country = ($args["country"] ?? null);
        $this->group = ($args["group"] ?? null);
        $this->win = ($args["win"] ?? null);
        $this->draw = ($args["draw"] ?? null);
        $this->loss = ($args["loss"] ?? null);
        $this->goals_favor = ($args["goals_favor"] ?? null);
        $this->goals_againts = ($args["goals_againts"] ?? null);
    }
}