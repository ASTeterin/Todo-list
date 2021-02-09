<?php

class Task {
    private $db = null;
    private $table_name = TABLE;
    public $id_task = null;
    public $task_name = null;
    public $task_text = null;
    public $is_done = null;

    public function __construct($db) {
        $this->db = $db;     
    }

    public function getTasksByIsDone($is_done) {
        $this->db->where(IS_DONE, $is_done);
        $task = $this->db->get($this->table_name);
        return (isset($task)) ? $task : null; 
    }

    public function delete($id) {
        $this->db->where(ID_TASK, $id);
        return ($this->db->delete($this->table_name))? $id : null ;
    }

    public function add($data) {
        $id = $this->db->insert(TABLE, $data);
        return (isset($id)) ? $id : null;    

    }

    public function makeDone($id) {
        $data = ['is_done' => 1];
        $this->db->where(ID_TASK, $id);
        return ($this->db->update(TABLE, $data))? $id : null;
    }

    public function getTaskById($id) {
        $this->db->where(ID_TASK, $id);
        $task = $this->db->get($this->table_name);
        return (isset($task)) ? $task : null; 
    }

    public function getOutstandingTasks() {

    }

}