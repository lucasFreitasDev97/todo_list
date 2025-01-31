<?php
include '../database/db.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id = $id";
    if ($conn->query($sql) === true){
        header('Location: ../index.php');
    }else{
        echo 'Error to task delete ' . $conn->error;
    }
}