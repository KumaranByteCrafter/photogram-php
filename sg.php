<pre>
<?php
include "libs/load.php";
//setcookie("testcookie","testvalue",time() + (8600 *30),"/");
print_r($_SERVER);
print("session\n");
print_r($_SESSION);
if(isset($_GET['clear'])){
    printf("clearing..\n");
    Session::unset();
}
if(Session::isset('a')){
    print("existing values is  " . Session::get('a') . "\n");
}else{
    Session::set('a',time());
    print("assigning value is $_SESSION[a]\n");
}
?>
</pre>