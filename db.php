<?php
$servername = "localhost";
$usernaname = "root"; 
$password = '';
$datbase ="ccit06";

$conn =new mysqli($servername, $usernaname, $password,$datbase);

if ($conn ->connect_error){
    die("connect failed:" -$conn->connect_error);
}
?>