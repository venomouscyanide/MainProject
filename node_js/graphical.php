<?php

echo $_POST['clicked'];echo $_POST['correct'];
$var1=$_POST['clicked'];
$var2=$_POST['correct'];

if(intval($var1)==intval($var2))
echo "success";

else
echo "fail";
?>
