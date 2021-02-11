<?php

class Database {

    private $host = HOST;
    private $db_name = DATABASE;
    private $username = USER;
    private $password = PASSWORD;

    public function getConnection()
    {
        return new MysqliDb($this->host, $this->username, $this->password, $this->db_name);
    }
}