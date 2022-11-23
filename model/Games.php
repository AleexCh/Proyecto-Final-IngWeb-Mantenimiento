<?php

namespace Model;

class Games extends BaseModel
{
    protected static string $table = "games";
    protected static array $columnsDB = ["id", "first_team", "second_team", "first_team_goals", "second_team_goals", "play_date", "type"];

    public int | null $id;
    public string | null $first_team;
    public string | null $second_team;
    public string | null $first_team_goals;
    public string | null $second_team_goals;
    public string | null $play_date;
    public string | null $type;

    public function __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->first_team = ($args["first_team"] ?? null);
        $this->second_team = ($args["second_team"] ?? null);
        $this->first_team_goals = ($args["first_team_goals"] ?? null);
        $this->second_team_goals = ($args["second_team_goals"] ?? null);
        $this->play_date = ($args["play_date"] ?? null);
        $this->type = ($args["type"] ?? null);
    }
}