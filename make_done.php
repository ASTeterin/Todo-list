<?php
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

$task->makeDone($id_task);


