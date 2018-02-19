<?php

// this code is obsolete >.<
//echo $_POST['name'].$_POST['age'].$_POST['mobile'].$_POST['address'].$_POST['password'].$_POST['email'];
// for checking if values entered are correct/ not empty
$flag=0;$mobile=0;
//!empty($_POST['age'])&&!emtpy($_POST['mobile'])&&!empty($_POST['address'])&&!empty($_POST['password'])
//is_int is not working FYI
//echo $_POST['name'];
if(!empty($_POST['name'])&&!empty($_POST['age'])&&!empty($_POST['mobile'])&&!empty($_POST['address'])&&!empty($_POST['password']))	
	{
	$flag=1;
	}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
	{
	$email=1;    
	}


if($email==1&&$flag==1)
	{echo "true";}
else
	{echo "false";}
?>
