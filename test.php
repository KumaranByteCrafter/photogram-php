<pre>
<?php
include "libs/load.php";

// print_r($_SERVER);
// print("get");
// print_r($_GET);
// print("post");
// print_r($_POST);
// print("files");
// print_r($_FILES);
// print("cookie");
// print_r($_COOKIE);
// if (signup("kumaranravi311","password","kumaranravi3112003@gmail.com","999999999")){
//     echo "success";
// }else{
//     echo "<br>fail";
// }
$mic1 = new Mic();
$mic2 = new Mic();
$mic1->brand = "Roda\n";
$mic2->brand = "Node\n";
print($mic1->brand);
print($mic2->brand);
// $mic1->light="RGB";
$mic1->setLight("white");
$mic1->setModel("hyper cast");
print("Model of 1st mic is " . $mic1->getModelproxy());
?>
</pre>