<?php
$host = '127.0.0.1';
$user = 'root';
$pass = 'root';
$dbName = 'todo_list';
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbName, $port);

if ($conn->connect_error){
    die('Connection Error: ' . $conn->connect_error);
}