<?php

class Task {
    private $conn;
    private $table_name = 'task';

    public $id_task;
    public $task_name;
    public $task_text;
    public $is_done;

    public function __construct($db) {
        $this->$conn = $db;     
    }

    public function read() {
        $this->$conn->where('id_task');
        $task = $this->$conn->get('task');
        return (isset($task)) ? $task : null; 
    }

}