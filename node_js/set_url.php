<?php
//setting the ipfs url in session 
session_start();

$_SESSION['url']=$_POST['url'];
echo $_SESSION['url'];
?>
