<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>edit</title>
</head>
<body>
<?php
    include "connect.php";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id = $_GET['id'];
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM ikan WHERE id = $id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $conn->close();
?>
    <form action="/database-php/action_edit.php" method="POST">
        <div class="mb-3">
            <label for="jenis_ikan" class="form-label">Nama</label>
            <input type="text" class="form-control" id= "jenis_ikan" placeholder="Masukan Nama" name="jenis_ikan" value="<?php echo $row['jenis_ikan'] ?>">
        </div>
        <div class="mb-3">
            <label for="habitat" class="form-label">Prodi</label>
            <input type="text" class="form-control" id= "habitat" placeholder="Masukan Program Studi" name="habitat" value="<?php echo $row['habitat'] ?>">
        </div>
        <div class="form-check mb-3">
            <label for="komoditas" class="form-label">Komoditas</label> 
            <select class="form-select mb-3" id="komoditas" name="komoditas"
            value="<?php echo $row['komoditas'] ?>">
                <option value="Air Tawar">Air Tawar</option>
                <option value="Air Laut">Air Laut</option>
                <option value="Air Payau">Air Payau</option>
            </select>
        </div> 

        <div class="mb-3">
            <label for="pangan" class="form-label">Pangan</label>
            <input type="text" class="form-control" id="pangan" placeholder="Masukan Pangan Ikan" name="pangan" value="<?php echo $row['pangan'] ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="submit" class="btn btn-primary" value="simpan!"></input>
    </form>

        
</body>
</html>