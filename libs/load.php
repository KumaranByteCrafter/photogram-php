<?php
include_once 'libs/includes/Mic.class.php';
include_once 'libs/includes/Database.class.php';
include_once 'libs/includes/User.class.php';
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
?>