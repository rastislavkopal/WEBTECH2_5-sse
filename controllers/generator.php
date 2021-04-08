<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "../models/ParamsModel.php";

session_start();
if (isset($_SESSION['a'])) {

    header("Cache-Control: no-cache");
    header("Content-Type: text/event-stream");
    header("Access-Control-Allow-Origin: *");


// check if connection was already established
    if (isset($_SERVER['HTTP_LAST_EVENT_ID']) && !empty($_SERVER['HTTP_LAST_EVENT_ID']) && is_numeric($_SERVER['HTTP_LAST_EVENT_ID'])) {
        $lastId = intval($_SERVER['HTTP_LAST_EVENT_ID']);
        $lastId++;
    } else {
        $lastId = 0;
    }

    while (true) {

        $json = ['x' => $lastId];

        if (isset($_SESSION['a']) && !empty($_SESSION['a'])) {
            $a = intval($_SESSION['a']);
            if (isset($_SESSION['y1']))
                $json["y1"] = sin($lastId * $a) * sin($lastId * $a);
            if (isset($_SESSION['y2']))
                $json["y2"] = cos($lastId * $a) * cos($lastId * $a);
            if (isset($_SESSION['y3']))
                $json["y3"] = sin($lastId * $a) * cos($lastId * $a);
        }

        // Send a simple message at random intervals.
        echo 'data: ' . json_encode($json) . "\n\n";

        ob_flush();
        flush();
        $lastId++;

        // Break the loop if the client aborted the connection (closed the page)
        if (connection_aborted()) break;

        sleep(3);
    }
} else {
    echo 'data: no params... :( :)';
}

