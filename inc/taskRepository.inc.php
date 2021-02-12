<?php

class TaskRepository 
{
    private $db = null;
    private $tableName = TABLE;

    public function __construct($db) 
    {
        $this->db = $db;     
    }

    public function getTasksByIsDone($isDone): ?array 
    {
        $this->db->where(IS_DONE, $isDone);
        $task = $this->db->get($this->tableName);
        return (isset($task)) ? $task : null; 
    }

    public function delete($id): ?int 
    {
        $this->db->where(ID_TASK, $id);
        return ($this->db->delete($this->tableName))? $id : null ;
    }

    public function add($data): ?int 
    {
        $id = $this->db->insert(TABLE, $data);
        return (isset($id)) ? $id : null;    

    }

    public function makeDone($id): ?int 
    {
        $data = ['is_done' => 1];
        $this->db->where(ID_TASK, $id);
        return ($this->db->update(TABLE, $data))? $id : null;
    }

    public function getTaskById($id): ?array 
    {
        $this->db->where(ID_TASK, $id);
        $task = $this->db->get($this->tableName);
        return (isset($task)) ? $task : null; 
    }
}