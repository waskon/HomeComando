<?php

//require_once 'docker/postgres/Dockerfile';
require_once 'config.php';
class Database
{
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct()
    {
        $this->username = POSTGRES_USER;
        $this->password = POSTGRES_PASSWORD;
        $this->host = POSTGRES_HOST;
        $this->database = POSTGRES_DB;
    }

    public function connect(){
        try{
            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode"=>"prefer"]
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $e){
            die("Connection failed: ".$e->getMessage());
        }
    }

}