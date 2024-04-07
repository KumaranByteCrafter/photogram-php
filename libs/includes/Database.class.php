<?php

class Database
{
    private static $host = "mysql.selfmade.ninja";
    private static $db_name = "kumaran_new";
    private static $username = "kumaran";
    private static $password = "kumaran311";
    public static $conn = null;
    public static function getDataBaseConnection()
    {   
        if(Database::$conn == null){
            $servername = "mysql.selfmade.ninja";
            $username = "kumaran";
            $password = "kumaran311";
            $dbname = "kumaran_new";
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
}