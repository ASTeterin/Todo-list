<?php

class Task {
    private $db = null;
    private $table_name = 'task';

    public $id_task = null;
    public $task_name = null;
    public $task_text = null;
    public $is_done = null;

    public function __construct($db) {
        $this->db = $db;     
    }

    public function read() {
        $this->db->where('id_task');
        $task = $this->db->get('task');
        return (isset($task)) ? $task : null; 
    }

}