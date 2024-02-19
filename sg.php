<pre>
<?php
include "libs/load.php";
//setcookie("testcookie","testvalue",time() + (8600 *30),"/");
print_r($_SERVER);
print("session\n");
print_r($_SESSION);
if(isset($_GET['clear'])){
    printf("clearing..\n");
<<<<<<< HEAD
    Session::unset();
}
if(Session::isset('a')){
    print("existing values is  " . Session::get('a') . "\n");
=======
    session_unset();
}
if(isset($_GET['destroy'])){
    printf("clearing..\n");
    session_destroy();
}
if(isset($_SESSION['a'])){
    print("existing values is $_SESSION[a] \n");
>>>>>>> origin/master
}else{
    Session::set('a',time());
    print("assigning value is $_SESSION[a]\n");
}
?>
</pre>