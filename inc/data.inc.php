<?php

function checkRequestedData($data) {
    foreach($data as $key => $value) {
        if (!in_array($key, COLUMN_NAMES)) {
            echo 'error in column name';
            return ERR_COLUMN_NAME;
        }
        if (strlen($value) > MAX_TASK_TEXT_LEN) {
            echo 'max len';
            return ERR_MAX_LEN_TEXT;
        }
    }
    return ERR_NO_ERROR;   
}

function getDataFromRequest() {
    $data = json_decode(file_get_contents("php://input"), true);
    return $data;
}