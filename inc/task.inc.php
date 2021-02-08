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

    public function add($data) {
        try {
            $id = $this->db->insert('task', $data);
            return (isset($id)) ? $id : null;    
        }
        catch (Exeption $ex) {
            echo $ex->getMessage();
       }
    }

    public function makeDone($id) {
        $data = ['is_done' => 1];
        $this->db->where('id_task', $id);
        $this->db->update('task', $data);
    }

}