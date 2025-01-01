<?php

class database
{
    private  $servername = "localhost";
    private $username = "root";
    private  $password = "Shezo@1234";
    private $database = "php_workshop";

    private $conn;
    public function __construct()
    {
        $this->conn = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->database
        );
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Connected successfully";
    }

    public function runDML(string $query):bool
    {
        if($this->conn->query($query)){
            return true;
        }
        return false;
    }

    public function runQuery(string $query):array
    {
      $data =   $this->conn->query($query);
      if ($data->num_rows > 0) {
          return $data->fetch_assoc();
      }
      return [];
    }
}
