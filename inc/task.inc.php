<?php

class Task {
    private $db = null;
    private $tableName = TABLE;
    public $idTask = null;
    public $taskName = null;
    public $taskText = null;
    public $isDone = null;

    public function __construct($db) {
        $this->db = $db;     
    }

    public function getTasksByIsDone($isDone) {
        $this->db->where(IS_DONE, $isDone);
        $task = $this->db->get($this->tableName);
        return (isset($task)) ? $task : null; 
    }

    public function delete($id) {
        $this->db->where(ID_TASK, $id);
        return ($this->db->delete($this->tableName))? $id : null ;
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
        $task = $this->db->get($this->tableName);
        return (isset($task)) ? $task : null; 
    }
}