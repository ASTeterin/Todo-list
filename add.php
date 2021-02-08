<?php

require_once('inc/common.inc.php');


function checkRequestedData($data) {
    foreach($data as $key => $value) {
        if (!in_array($key, COLUMN_NAMES)) {
            echo 'error in column name';
            return ERR_COLUMN_NAME;
        }
        if (strlen($value) > MAX_TASK_TEXT_LEN) {
            echo 'max len';
            return ERR_MAX_LEN_TEXT;
        }
    }
    return ERR_NO_ERROR;   
}

$data = json_decode(file_get_contents("php://input"), true);
//echo '1111';
print_r($data);

$database = new Database();
$db = $database->getConnection();
//print_r($db);
$task = new Task($db);
 
if (!checkRequestedData($data)) {
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

