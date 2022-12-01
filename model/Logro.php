<?php

namespace Model;

class Logro extends BaseModel
{
    protected static string $table = "history";
    protected static array $columnsDB = ["id", "team_id", "year","place","description"];

    public int|null $id;
    public int|null $team_id;
    public string | null $year;
    public string | null $place;
    public string | null $description;

    public function __construct($args = [])
    {
        $this->id = ($args["id"] ?? null);
        $this->team_id = ($args["team_id"] ?? null);
        $this->year = ($args["year"] ?? null);
        $this->place = ($args["place"] ?? null);
        $this->description = ($args["description"] ?? null);

    }
}