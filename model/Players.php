<?php

namespace Model;

class Players extends BaseModel
{
    protected static string $table = "players";
    protected static array $columnsDB = ["id", "full_name", "player_number", "team_id"];

    public int | null $id;
    public string | null $full_name;
    public string | null $player_number;
    public int | null $team_id;


    public function  __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->full_name = ($args["full_name"] ?? null);
        $this->player_number = ($args["player_number"] ?? null);
        $this->team_id = ($args["team_id"] ?? null);
    }
}