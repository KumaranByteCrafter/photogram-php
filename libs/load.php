<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'libs/includes/Session.class.php';
include_once 'libs/includes/Database.class.php';
include_once 'libs/includes/User.class.php';
include_once 'libs/includes/Mic.class.php';
include_once 'libs/includes/UserSession.class.php';
global $__site_config;
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../photogramconfig.json');

Session::start();
echo "Session started.<br>";

function get_config($key,$default=null){
    global $__site_config;
    $array = json_decode($__site_config,true);
    if(isset($array[$key])){
        return $array[$key];
    }else{
        return $default;
    }
}
function load_template($name){
    include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php"; //consistent
}
function validate_credential($email, $password) {
    try {
        $conn = Database::getConnection();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT `email`, `password` FROM `auth` WHERE `email` = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $userCredentials = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userCredentials && password_verify($password, $userCredentials['password'])) {
            // Credentials match
            return true;
        } else {
            // Credentials do not match
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
Database::disconnect();
?>