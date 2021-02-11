<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = new Task($db);

$result = $task->getTasksByIsDone(TASK_IS_NOT_COMPLETED);

isset($result)? generateResponse(STATUS_200, $result) : generateResponse(STATUS_500, SERVER_ERROR);