<?php
class UserSession
{
    //this function will return a session id if username  and pass is correct
    public static function authenticate($user,$pass){
        $username =  User::login($user,$pass);
        $user = User($username);
        if($username){
            $conn = Database::getConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0,9999999).$ip.$agent.time());
            $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)
            VALUES (:usid, :token, now(), :ip, :agent, '1')";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':usid', $user->id);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':ip', $ip);
            $stmt->bindParam(':agent', $agent);        
            if($stmt->execute()){
                Session::set('session_token',$token);
                return $token;
            }else{
                return false;
            }
            

        }else{
            return false;
        }
    }
    public function __construct($token)
{
    try {
        // Get the connection
        $this->conn = Database::getConnection();
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        // Set the id
        $this->token = $token;
        $this->data = null;
        // Prepare the query
        $query = "SELECT * FROM 'session' WHERE 'token' = :token LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Fetch the user data
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userRow) {
            $this->data = $userRow;
            $this->uid = $userRow['uid']; // update this from db
            
        } else {
            throw new Exception("User not found");
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "General error: " . $e->getMessage();
    }
}
public function getUser(){
    return new User($this->uid);
}
}