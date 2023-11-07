<?php
class Database {
    private $host = "mysql";
    private $port = "3306";
    private $database = "auth";
    private $db_username = "root";
    private $db_password = "root";
    public $conn;

    function getConnect() {
        $conn = new mysqli($this->host, $this->db_username, $this->db_password, $this->database, $this->port);
        if ($conn->connect_error) {
            die("Ошибка: Невозможно подключиться к MySQL " . $conn->connect_error);
        }
        return $conn;
    }
}
