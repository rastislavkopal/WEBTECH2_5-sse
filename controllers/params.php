<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "../models/ParamsModel.php";

$toUpdate = [];

if (isset($_POST['a']) && !empty($_POST['a'])){
    $toUpdate["a"] = (isset($_POST['a']) ? $_POST['a'] : null );
}

if (isset($_POST['y1_check']) && !empty($_POST['y1_check'])){
    $toUpdate["y1"] =  (isset($_POST['y1_check']) ? $_POST['y1_check'] : null );
}

if (isset($_POST['y2_check']) && !empty($_POST['y2_check'])){
    $toUpdate["y2"] = (isset($_POST['y2_check']) ? $_POST['y2_check'] : null );
}

if (isset($_POST['y3_check']) && !empty($_POST['y3_check'])){
    $toUpdate["y3"] = (isset($_POST['y3_check']) ? $_POST['y3_check'] : null );
}

if (isset($_POST['client_id']) && !empty($_POST['client_id'])){
    $toUpdate["user_id"] = (isset($_POST['client_id']) ? $_POST['client_id'] : null );
}


$model = new ParamsModel();

echo $model->createRecord($toUpdate) . "<br>" . var_dump($toUpdate);

