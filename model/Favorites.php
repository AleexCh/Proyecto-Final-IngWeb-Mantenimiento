<?php

namespace Model;

class Favorites extends BaseModel
{
    protected static string $table = "favorite";
    protected static array $columnsDB = ["id", "user_id", "team_id"];

    public int|null $id;
    public int|null $user_id;
    public int|null $team_id;

    public function __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->user_id = ($args["user_id"] ?? null);
        $this->team_id = ($args["team_id"] ?? null);
    }
}