<?php

    define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . "/CoffeeMania");
    define("BASE_URL", "/CoffeeMania");

    date_default_timezone_set('Asia/Kolkata');

    $con = mysqli_connect("localhost", "root", "", "coffeemania");

    function pathOf($path)
    {
        return BASE_DIR . "/" . $path;
    }

    function urlOf($path)
    {
        return BASE_URL . '/' . $path;
    }

    session_start();