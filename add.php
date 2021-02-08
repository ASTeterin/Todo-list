<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
//print_r($db);
$task = new Task($db);

$input = json_decode(
    file_get_contents('php://input'),
    true
);

//var_dump($input);
$task->add();