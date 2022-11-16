<?php

try {
    $db = mysqli_connect(
        "127.0.0.1",
        "root",
        "root",
        "futbol"
    );

} catch (mysqli_sql_exception $exception) {
    echo "<pre>";
    echo $exception->getMessage();
    echo "</pre>";
    exit();
}