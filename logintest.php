<?php
include 'libs/load.php';

$user = 'kumaran'; // Default username for testing
$pass = isset($_GET['pass']) ? $_GET['pass'] : '';
$result = null;

if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>Login Again</a>");
}

if (Session::get('is_loggedin')) {
    $username = Session::get('session_username');
    $userobj = new User($username); // Assuming 'username' is the identifier
    echo "Welcome back " . $userobj->getUsername(); // Call to getUsername() method
} else {
    echo "No Session found, trying to login now.<br>";
    $result = User::login($user, $pass);
    if ($result) {
        $userobj = new User($user);
        echo "Login success: " . $userobj->getUsername(); // Call to getUsername() method
        Session::set('is_loggedin', true);
        Session::set('session_username', $user); // Store username in session
    } else {
        echo "Login Failed for user: $user<br>";
    }
}

echo <<<EOL
<br><br><a href="logintest.php?logout">Logout</a>
EOL;
?>
