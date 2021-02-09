<?php

const MAX_TASK_TEXT_LEN = 1000;
const HOST = '127.0.0.1';
const USER = 'root';
const PASSWORD = 'Qwerty123';
const DATABASE = 'task';
const TABLE = 'task';
const ACTION = 'action';
const ADD = 'add';
const DELETE = 'delete';
const UPDATE = 'update';    
const ID_TASK = 'id_task';
const COLUMN_NAMES = ['task_name', 'task_text', 'is_done'];

const SUCCESSFUL_RESULT = ['result' => 'success'];
const BAD_REQUEST = ['error' => 'Bad Request'];
const NO_TASK = ['error' => 'Task is missing'];
const DB_ERROR = ['error' => 'DB error'];
