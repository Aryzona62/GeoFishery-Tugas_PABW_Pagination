<?php

// print_r($_POST);
    
    include "connect.php";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO ikan ( jenis_ikan, komoditas, habitat, pangan)
    VALUES ('".$_POST["jenis_ikan"]."', '".$_POST["komoditas"]."', '".$_POST["habitat"]."','".$_POST["pangan"]."')";

    if ($conn->query($sql) === TRUE) {
    header("Location: ikan.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>