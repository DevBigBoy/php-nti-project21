<?php

class config
{
    private $hostname = "localhost";
    private $username = 'root';
    private $pass = "";
    private $dbname = 'e-commerce';
    private $con;

    public function __construct()
    {
        $this->con = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);

        // if ($this->con->connect_error) {
        //     die("Connection failed: " . $this->con->connect_error);
        // } else {
        //     echo "Connected Successfully!";
        // }
    }

    public function runDML(string $query): bool
    {
        $result = $this->con->query($query);
        if ($result) {
            return true;
        }
        return false;
    }

    public function runDQL(string $query)
    {
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            return $result;
        }
        return  [];
    }
}
