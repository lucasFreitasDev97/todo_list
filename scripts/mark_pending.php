<?php
include '../database/db.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "UPDATE tasks SET is_done = false WHERE id = $id";

    if ($conn->query($sql) === true){
        header('Location: ../index.php');
    }else{
        echo 'Error to make pending: ' . $conn->error;
    }
}