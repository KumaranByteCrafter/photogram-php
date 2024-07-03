<?php
include_once 'libs/includes/Session.class.php';
include_once 'libs/includes/Database.class.php';
include_once 'libs/includes/User.class.php';
Session::start();
function load_template($name){
    include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php"; //consistent
}
function validate_credential($username,$password){
    if($username == 'kumaran@gmail.com' and $password == "pass"){
        return true;
    }else{
        return false;
    }
}
?>