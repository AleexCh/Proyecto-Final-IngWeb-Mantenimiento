<?php

try {
    $db = mysqli_connect(
        "",
        "",
        "",
        ""
    );

} catch (mysqli_sql_exception $exception) {
    echo "<pre>";
    echo $exception->getMessage();
    echo "</pre>";
    die();
}