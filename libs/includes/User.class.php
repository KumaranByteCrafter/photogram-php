<?php
class User
{
    public static function signup($user,$pass,$email,$phone)
    {
        try {
            $pass = md5(strrev(md5($pass))); //security through obsecurity
            $conn = Database::getDataBaseConnection();
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
    Database::disconnect();
    return $error;
    }
    public static function login($user,$pass){
        $pass = md5(strrev(md5($pass)));
        $query = "SELECT * FROM auth WHERE 'username' = '$user'";
        $conn = Database:: getDataBaseConnection();
    }
}
?>