<?php
include '../database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];

    $sql = "INSERT INTO tasks (title) VALUES ('$title')";

    if ($conn->query($sql) === true){
        header('Location: ../index.php');
    }else{
        echo 'Error to add task: ' . $conn->error;
    }
}