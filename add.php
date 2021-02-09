<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
$data = getDataFromRequest();
 
if (!checkRequestData($data)) {
    $result = $task->add($data);
    if ($result)
        echo 'task was added';   
    }
    else {
        header('HTTP/1.0 400 Bad Request');
        echo json_encode(array(
        'error' => 'Bad Request'
    ));
}

