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
        $task = $this->db->get($this->table_name);
        return (isset($task)) ? $task : null; 
    }

    public function delete($id) {
        $this->db->where('id_task', $id);
        if ($this->db->delete($this->table_name)) echo 'successful';

    }

    public function add() {
        $data = Array (
            "task_name" => "adm",
            "task_text" => "John",

        );

        $d = ['task_name' => 'task1234', 'task_text' => 'task2 text']; 

        //$this->db->where('id_task', 4);
        //$task = $this->db->get($this->table_name);
        //$newTask = new Task($this->db);

        //$newTask->task_name = $task->task_name;
        //$newTask->task_text = $task->task_text;
        //$newTask->is_done = $task->is_done;

        $id = $this->db->insert('task', $d);
        var_dump($id);
        //$this->db->where('id_task', 4);
        //$this->db->update('task', $d);
        if($id)
        echo 'task was created. Id=' . $id;
        else echo "error";
    }

    public function makeDone($id) {
        $data = ['is_done' => 1];
        $this->db->where('id_task', $id);
        $this->db->update('task', $data);
    }

}