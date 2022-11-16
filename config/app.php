<?php

require __DIR__ . "./../vendor/autoload.php";
require __DIR__ . "./database.php";
use Model\BaseModel;

BaseModel::setDB($db);