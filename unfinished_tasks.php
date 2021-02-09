<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = new Task($db);

$result = $task->getTasksByIsDone(TASK_IS_NOT_COMPLETED);
if ($result) {
    var_dump($result);
}