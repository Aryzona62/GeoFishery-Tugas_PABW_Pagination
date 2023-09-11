<?php
    include "connect.php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id = $_GET['id'];
    $sql = "DELETE FROM ikan WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ikan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>