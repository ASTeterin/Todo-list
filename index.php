<?php
require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
//print_r($db);
$task = new Task($db);
var_dump($task->getTasksByIsDone(1));

//print_r(getAllData());
