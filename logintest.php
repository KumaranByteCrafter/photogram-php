<?php
include 'libs/load.php';
$user = 'kumaran';
$pass = isset($_GET['pass']) ? $_GET['pass'] : '';
$result = null;
if (isset($_GET['logout'])){
    Session::destroy();
    die("Session destroyed,<a href='logintest.php'>Login Again</a>");
}
if(Session::get('is_loggedin')){
    $userdata = Session::get('session_user');
    print("welcome back,$userdata[username]");
    $result = $userdata;
}else{
    printf("No Session found, trying to login now.<br>");
    $result = User::login($user,$pass);
    if($result){
        echo "Login success,$result[username]";
        Session::set('is_loggedin',true);
        Session::set('session_user',$result);
    }else{
        echo "Login Failed, $user<br>";
    }
}

