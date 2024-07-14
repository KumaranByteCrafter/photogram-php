<?php
class User
{
    public static function signup($user,$pass,$email,$phone)
    {
        try {
            $options = [
                'cost' => 9,
            ];
            $pass = password_hash($pass,PASSWORD_BCRYPT,$options);
            $conn = Database::getConnection();
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
        try {
            $conn = Database::getConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM auth WHERE username = :user";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user', $user);   
            $stmt->execute();
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            //if ($userRow && $userRow['password'] === $pass) {
            if (password_verify($pass,$userRow['password'])) {
                // Login successful
                return $userRow;
            } else {
                // Invalid username or password
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}

}
?>