<?php

//include it to get the environment
include 'app.conf.local.php';

    $host = "127.0.0.1";
    $userName = "root";
    $password = "";
    $database = "pailasteaed";

//when $environment is set to live in app.conf.local.php using live db 
if ($environment === "live") {
    $host = "localhost";
    $userName = "vhost97514s0";
    $password = "pikksalas6na";
    $database = "vhost97514s0";
}
?>