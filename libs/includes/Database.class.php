<?php

class Database
{
    public static $conn = null;
    public static function getConnection()
    {   
        if(Database::$conn == null){
            $servername = get_config('db_server');
            $username = get_config('db_username');
            $password = get_config('db_password');
            $dbname = get_config('db_name');
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // Set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "new connection establishing";
                Database::$conn = $conn; //replacing null with actual value
                return Database::$conn;
                
            } catch (PDOException $e) { 
                $a = "Error: " . $e->getMessage(); // Display meaningful error message
                $error = $a;
            }
        }else{
            echo "Returning existing  establish";
            return Database::$conn;
        }
    }
    public static function disconnect() {
        $conn = null;
        
    }
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
}