<?php
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