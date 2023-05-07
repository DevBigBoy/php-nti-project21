<?php


class config
{
    private $hostname = "localhost";
    private $username = 'root';
    private $pass = "";
    private $dbname = 'e-commerce';

    public function __construct()
    {
        $con = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);

        // if ($con->connect_error) {
        //     die("Connection failed: " . $con->connect_error);
        // } else {
        //     echo "Connected Successfully!";
        // }
    }
}