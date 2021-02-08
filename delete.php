<?php
require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
//print_r($db);
$task = new Task($db);
$task->delete(1);