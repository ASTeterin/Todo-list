<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
$data = getDataFromRequest();
 
if (checkAddRequest($data) <> ERR_NO_ERROR) {
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(BAD_REQUEST);
    return;
}

echo ($task->add($data))? json_encode(SUCCESSFUL_RESULT) : json_encode(DB_ERROR); 
