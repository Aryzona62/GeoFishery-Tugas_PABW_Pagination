<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Insert data</title>
</head>
<body>
    <form action="/database-php/action.php" method="POST">
        <div class="mb-3">
            <label for="jenis_ikan" class="form-label">Jenis Ikan</label>
            <input type="text" class="form-control" id="jenis_ikan" placeholder="Masukan Jenis Ikan" name="jenis_ikan">
        </div>
        <div class="mb-3">
            <label for="habitat" class="form-label">habitat</label>
            <input type="text" class="form-control" id="habitat" placeholder="Masukan Habitat Ikan" name="habitat">
        </div>
        <div class="form-check mb-3">
            <label for="komoditas" class="form-label">Komoditas</label> 
            <select class="form-select mb-3" id="komoditas" name="komoditas">
                <option value="Air Tawar">Air Tawar</option>
                <option value="Air Laut">Air Laut</option>
                <option value="Air Payau">Air Payau</option>
            </select>
        </div> 


        <div class="mb-3">
            <label for="pangan" class="form-label">Pangan</label>
            <input type="text" class="form-control" id="pangan" placeholder="Masukan Habitat Ikan" name="pangan">
        </div>

        

        <input type="submit" class="btn btn-primary" value="simpan!"></input>
    </form>
</body>
</html>