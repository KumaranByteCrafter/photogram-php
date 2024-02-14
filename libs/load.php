<?php
include_once 'libs/includes/Mic.class.php';

function load_template($name){
    include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php"; //not consistent
}
function validate_credential($username,$password){
    if($username == 'kumaran@gmail.com' and $password == "pass"){
        return true;
    }else{
        return false;
    }
}
function signup($user,$pass,$email,$phone)
{
    $servername = "mysql.selfmade.ninja";
    $username = "kumaran";
    $password = "kumaran311";
    $dbname = "kumaran_new";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Use prepared statement to insert data
        $stmt = $conn->prepare("INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
                                VALUES (:user, :pass, :email, :phone, '0', '1')");
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $error=false;
        if ($stmt->execute()) {
            $error =  false;
        } else {
            echo "Error: Unable to execute the query";
            $error= true;
        }
    } catch (PDOException $e) {
        $a = "Error: " . $e->getMessage(); // Display meaningful error message
        $error = $a;
    }
  $conn = null;
  return $error;
}

?>