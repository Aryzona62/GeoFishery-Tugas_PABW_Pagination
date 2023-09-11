<?php
    include "connect.php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id = $_POST['id'];
    $sql = "UPDATE ikan SET  jenis_ikan='".$_POST["jenis_ikan"]."', habitat='".$_POST["habitat"]."', komoditas='".$_POST["komoditas"]."', pangan='".$_POST["pangan"]."' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ikan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>