<?php

function checkAddRequest($data): int 
{
    foreach($data as $key => $value) 
    {
        if (!in_array($key, Config::COLUMN_NAMES)) 
        {
            return ERR_COLUMN_NAME;
        }
        if (strlen($value) > Config::MAX_TASK_TEXT_LEN) 
        {
            return ERR_MAX_LEN_TEXT;
        }
    }
    return ERR_NO_ERROR;   
}

function getDataFromRequest(): ?array 
{
    $data = json_decode(file_get_contents("php://input"), true);
    return $data;
}