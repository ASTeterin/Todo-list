<?php
require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = RepositoryFactory::build(Config::TYPE_REPOSITORY, $db);
$data = getDataFromRequest();

if (!isset($data[Config::ID_TASK])) 
{
    Response::generateResponse(Response::STATUS_400, Response::BAD_REQUEST);
    return;
}

$idTask = $data[Config::ID_TASK];
if (!$task->getTaskById($idTask)) 
{
    Response::generateResponse(Response::STATUS_404, Response::NO_TASK);
    return;    
}

$result = $task->delete($idTask);
if (isset($result))
{
    Response::generateResponse(Response::STATUS_200, Response::SUCCESSFUL_RESULT);
}
else
{
    Response::generateResponse(Response::STATUS_500, Response::SERVER_ERROR); 
}

