<?php

$username = "root";
$password="";
$server ="localhost";
$db = "customerdetails";

// 
// $username = "epiz_29869938";
// $password="md3I9IKIOCqs";
// $server ="sql201.epizy.com";
// $db = "epiz_29869938_BankDB";



$con = mysqli_connect($server,$username,$password,$db);

if(!$con)
{
  die("No connection->".mysqli_connect_error());
}


?>

<!-- epiz_29869938_BankDB	epiz_29869938	(Your vPanel Password)	sql201.epizy.com -->