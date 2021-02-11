<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = RepositoryFactory::build(TYPE_REPOSITORY, $db);

$result = $task->getTasksByIsDone(TASK_IS_DONE);

isset($result)? generateResponse(STATUS_200, $result) : generateResponse(STATUS_500, SERVER_ERROR);