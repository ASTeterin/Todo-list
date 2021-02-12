<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = RepositoryFactory::build(Config::TYPE_REPOSITORY, $db);

$result = $task->getTasksByIsDone(Config::TASK_IS_DONE);

if (isset($result))
{
    Response::generateResponse(Response::STATUS_200, $result);
}
else
{
    Response::generateResponse(Response::STATUS_500, Response::SERVER_ERROR); 
}