<?php
require_once('inc/common.inc.php');

$database = new Database();
$db = $database->getConnection();
$task = RepositoryFactory::build(TYPE_REPOSITORY, $db);
$data = getDataFromRequest();

if (!isset($data[ID_TASK])) 
{
    generateResponse(STATUS_400, BAD_REQUEST);
    return;
}

$idTask = $data[ID_TASK];
if (!$task->getTaskById($idTask)) 
{
    generateResponse(STATUS_404, NO_TASK);
    return;    
}

($task->delete($idTask))? generateResponse(STATUS_200, SUCCESSFUL_RESULT) : generateResponse(STATUS_500, SERVER_ERROR);
    

