<?php
include '../database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];
    $date = $_POST['date'];

    $sql = "INSERT INTO tasks (title, date) VALUES ('$title', '$date')";

    if ($conn->query($sql) === true){
        header('Location: ../index.php');
    }else{
        echo 'Error to add task: ' . $conn->error;
    }
}