<pre>
<?php
session_start();
include "libs/load.php";
setcookie("testcookie","testvalue",time() + (8600 *30),"/");
print("session\n");
print_r($_SESSION);
if(isset($_SESSION['a'])){
    print("existing values is $_SESSION[a] \n");
}else{
    $_SESSION['a'] = time();
    print("assigning value is $_SESSION[a]\n");
}
?>
</pre>