<?php
const HOST = '127.0.0.1';
const USER = 'root';
const PASSWORD = 'Qwerty123';
const DATABASE = 'task';

class Database {

    private $host = HOST;
    private $db_name = DATABASE;
    private $username = USER;
    private $password = PASSWORD;
    public $db = null;

    public function getConnection(){

        $this->db = null;
        $this->db = new MysqliDb(HOST, USER, PASSWORD, DATABASE);
        //$this->$db = new MysqliDb($this->$host, $this->$username, $this->$password, $this->$db_name);
        return $this->db;
    }


}