<?php
$host="localhost";
$USERNAME="root";
$PASSWORD="";
$db="finance";
$conn=mysqli_connect($host,$USERNAME,$PASSWORD,$db);
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  
?>