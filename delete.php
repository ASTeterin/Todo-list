<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
//print_r($db);
$task = new Task($db);
$data = file_get_contents("php://input");
echo '1111';
print_r($data);
//$task->delete(1);