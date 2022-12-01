<?php

namespace Model;

class Games extends BaseModel
{
    protected static string $table = "games";
    protected static array $columnsDB = ["id", "first_team", "second_team", "first_team_goals", "second_team_goals", "play_date", "fase_id"];

    public int | null $id;
    public int | null $first_team;
    public int | null $second_team;
    public string | null $first_team_goals;
    public string | null $second_team_goals;
    public string | null $play_date;
    public int | null $fase_id;

    public function __construct($args = [])
    {
        $this->id = (!empty($args["id"]) ?? null);
        $this->first_team = (!empty($args["first_team"]) ?? null);
        $this->second_team = (!empty($args["second_team"]) ?? null);
        $this->first_team_goals = (!empty($args["first_team_goals"]) ?? null);
        $this->second_team_goals = (!empty($args["second_team_goals"]) ?? null);
        $this->play_date = (!empty($args["play_date"]) ?? null);
        $this->fase_id = (!empty($args["fase_id"]) ?? null);
    }
}