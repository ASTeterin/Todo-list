<?php

const SUCCESSFUL_RESULT = ['result' => 'Success'];
const BAD_REQUEST = ['error' => 'Bad Request'];
const NO_TASK = ['error' => 'Task is missing'];
const SERVER_ERROR = ['error' => 'Server error'];

const STATUS_200 = 'HTTP/1.0 200 200 OK ';
const STATUS_400 = 'HTTP/1.0 400 Bad request';
const STATUS_404 = 'HTTP/1.0 404 Not found';
const STATUS_500 = 'HTTP/1.0 500 Internal Server Error';

function generateResponse($status, $data)
{
    header($status);
    echo json_encode($data);    
}