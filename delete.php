<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
$data = getDataFromRequest();

if (!$data[ID_TASK]) {
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Bad Request'
        ));
    return;
}

$id_task = $data[ID_TASK];
if (!$task->getTaskById($id_task)) {
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Task is missing'
        ));
    return;    
}

    if ($task->delete($data[ID_TASK])) {
        echo json_encode(SUCCESSFUL_RESULT);
    }
    

