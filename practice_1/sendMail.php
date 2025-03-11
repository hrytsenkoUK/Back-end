<?php
$sTo = 'artemgritsenko6@gmail.com';
$subject = 'MY TEST EMAIL';
$sMessage = "TEST EMAIL";
$sHeaders = 'From: artemgritsenko6@gmail.com';

echo '============' . "\n";
echo $subject . "\n";
echo '============' . "\n";

$firstName = 'Artem';
$text1 = "firstName : {$firstName}" . "\n";
$text2 = "Email is test". "\n";

$sMessage = $firstName.$text1.$text2;

echo "Message :\n$sMessage";

mail($sTo, $subject, $sMessage, $sHeaders);
