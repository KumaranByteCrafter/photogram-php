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
$mic1 = new Mic("Roda");//constructing the object
$mic2 = new Mic("Hyperx");//constructing the object

Mic::testfunction();//no construction , no disctruction
$mic1->setLight("white");
$mic2->setLight("Green");

 $mic1->setModel("hyper cast");
print("Model of 1st mic is " . $mic1->getModelproxy());
print("\n" .  $mic1->getbrand());
print("\n" . $mic2->getBrand());
print("this is mono font inside the pre tag");
$mic1->getVoltage("hello",array(1,2,3,5));


?>
</pre>
