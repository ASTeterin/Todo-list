<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
$data = getDataFromRequest();
 
if (checkAddRequest($data) <> ERR_NO_ERROR) {
    generateResponse(STATUS_400, BAD_REQUEST);
    return;
}

($task->add($data))?  generateResponse(STATUS_200, SUCCESSFUL_RESULT) : generateResponse(STATUS_500, SERVER_ERROR); 
