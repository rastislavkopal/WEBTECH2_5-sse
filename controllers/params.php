<?php
include_once "../models/ParamsModel.php";

if (!isset($_POST['a']) || !isset($_POST['y1_check']) || !isset($_POST['y2_check']) || !isset($_POST['y3_check']) || empty($_POST['a']) || !is_numeric($_POST['a']) ){
    echo "not good req.... :(";
    return;
}

$toUpdate["a"]  = intval($_POST['a']);
$toUpdate["y1"] = (!empty($_POST['y1_check']) && is_numeric($_POST['y1_check'])) ? intval($_POST['y1_check']) : null;
$toUpdate["y2"] = (!empty($_POST['y2_check']) && is_numeric($_POST['y2_check'])) ? intval($_POST['y2_check']) : null;
$toUpdate["y3"] = (!empty($_POST['y3_check']) && is_numeric($_POST['y3_check'])) ? intval($_POST['y3_check'] ) : null;


$model = new ParamsModel();

echo ($ret = $model->updateParams($toUpdate) == 1) ? "Zmena vykonaná" : $ret;

