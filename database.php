<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'cruds';


$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn){
    die('connection failed:' .mysqli_connect_errno());
}
?>