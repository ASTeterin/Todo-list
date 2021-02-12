<?php

require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = RepositoryFactory::build(Config::TYPE_REPOSITORY, $db);
$data = getDataFromRequest();
 
if (checkAddRequest($data) <> TaskError::ERR_NO_ERROR) 
{
    Response::generateResponse(Response::STATUS_400, Response::BAD_REQUEST);
    return;
}

if ($task->add($data))
{
    Response::generateResponse(Response::STATUS_200, Response::SUCCESSFUL_RESULT);
}
else
{
    Response::generateResponse(Response::STATUS_500, Response::SERVER_ERROR); 
}

