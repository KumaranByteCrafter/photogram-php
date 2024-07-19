<?php
class User
{
    private $id;
    private $username;
    private $conn;
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
//user object be costructed with both userid and username
public function __construct($username)
{
    try {
        // Get the connection
        $this->conn = Database::getConnection();
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Set the username
        $this->username = $username;
        $this->id = null;

        // Prepare the query
        $query = "SELECT id FROM auth WHERE username = :username or id = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Fetch the user data
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userRow) {
            $this->id = $userRow['id']; // Set the user ID
            //echo "User ID: " . $this->id . "\n";
        } else {
            throw new Exception("User not found");
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "General error: " . $e->getMessage();
    }
}
public function __call($name, $arguments) {
    if (strpos($name, 'get') === 0) {
        $property = lcfirst(substr($name, 3)); // Extract property name from method name
        return $this->_get_data($property); // Call _get_data method with property name
    } elseif (strpos($name, 'set') === 0) {
        $property = lcfirst(substr($name, 3)); // Extract property name from method name
        return $this->_set_data($property, $arguments[0]); // Call _set_data method with property name and value
    } else {
        throw new \BadMethodCallException("Method $name not found");
    }
}

private function _get_data($var) {
    if (!$this->conn) {
        $this->conn = Database::getConnection();
    }
    // Ensure $var is properly escaped if it's a direct column name
    $sql = "SELECT $var FROM auth WHERE id = :id";  // Example assuming $var is a direct column name
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result[$var];
    } else {
        return null;
    }
}
   // Method to set data for a specific column
   private function _set_data($var, $data)
   {
       try {
           if (!$this->conn) {
               $this->conn = Database::getConnection();
           }
           $sql = "UPDATE users SET $var = :data WHERE id = :id";
           $stmt = $this->conn->prepare($sql);
           $stmt->bindParam(':data', $data);
           $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
           return $stmt->execute();
       } catch (PDOException $e) {
           echo "Database error: " . $e->getMessage();
       }
   }
    public function setDob($year,$month,$day){
        if(checkdate($month,$day,$year)){
            return $this->_set_data('dob',"$year.$month.$day");
        }else{
            return false;
        }
    }
}
?>