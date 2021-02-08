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

if (!$data['id_task']) {
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Bad Request'
        ));
}
else {
    $task->delete($data['id_task']);
}

