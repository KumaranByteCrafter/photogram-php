<?php
$time = microtime(true);
$options = [
    'cost' => 9,
];
echo password_hash("welcome",PASSWORD_DEFAULT,$options);
echo "\n Took ".(microtime(true) - $time) . " sec";