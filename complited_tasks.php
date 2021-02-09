<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
//$data = getDataFromRequest();

$result = $task->getTasksByIsDone(TASK_IS_DONE);
if ($result) {
    var_dump($result);
}