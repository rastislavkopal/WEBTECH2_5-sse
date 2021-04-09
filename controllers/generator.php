<?php

include_once "../models/ParamsModel.php";
$model = new ParamsModel();

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
    $params = $model->getParams();

    if (isset($params['a'])) {
        $a = $params['a'];
        if (isset($params['y1']) && $params['y1'] == 1)
            $json["y1"] = sin($lastId * $a) * sin($lastId * $a);
        if (isset($params['y2']) && $params['y2'] == 1)
            $json["y2"] = cos($lastId * $a) * cos($lastId * $a);
        if (isset($params['y3']) && $params['y3'] == 1)
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

