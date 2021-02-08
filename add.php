<?php

require_once('inc/common.inc.php');
const COLUMN_NAMES = ['id_task', 'task_name', 'task_text', 'is_done'];

function checkRequestedData($data) {
    foreach($data as $key => $value) {
        if (!in_array($key, COLUMN_NAMES)) {
            echo 'error in column name';
            return 1;
        }
        if (strlen($value) > MAX_TASK_TEXT_LEN) {
            echo 'max len';
            return 1;
        }
    }
    return 0;   
}

$database = new Database();
$db = $database->getConnection();
//print_r($db);
$task = new Task($db);
$data = [
    'task_name1' => 'qwerty',
    'task_text' => 'ehwfhewjkgwkjghjh hjegkhekgh eghrjhj erhejerkehjjehk'
];

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

