<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container mt-3">
  <h2>Basic Table</h2>
  <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
      Tambah data
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="insert.php">Tambah Data</a></li>
    </ul>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Jenis Ikan</th>
        <th>Komoditas</th>
        <th>Habitat</th>
        <th>Pangan</th>
      </tr>
    </thead>
    <tbody>

        <?php
            include "connect.php";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            //$sql = "SELECT * FROM ikan";
            //$result = $conn->query($sql);

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
            $offset = ($page - 1) * $limit;
            $order = isset($_GET['order']) ? $_GET['order'] : 'id';
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            // $total_page = ceil($total/$limit);

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($search != "") {
                $sql = "SELECT * FROM ikan WHERE jenis_ikan LIKE '%$search%' ORDER BY $order ASC LIMIT $limit OFFSET $offset";
                $result = $conn->query($sql);
            } else {
                $sql = "SELECT * FROM ikan ORDER BY $order ASC LIMIT $limit OFFSET $offset";
                $result = $conn->query($sql);
            }

            if ($result->num_rows > 0) {
            // output data of each row
            $no = 0;
            while($row = $result->fetch_assoc()) {
                $no++;
            echo    "<tr>
                    <td>$no</td>
                    <td>". $row["jenis_ikan"]."</td>
                    <td>". $row["komoditas"]."</td>
                    <td>". $row["habitat"]."</td>
                    <td>". $row["pangan"]."</td>
                    <td>
                    <a href='edit.php?id=".$row["id"]."'><button type='button' class='btn btn-primary'>Edit</button></a>
                    <a href='delete.php?id=".$row["id"]."'><button type='button' class='btn btn-danger'>Hapus</button></a>
                    </td>

                </tr>";
            }
            } else {
            echo "0 results";
            }
            $conn->close();
        ?>
    
    </tbody>
  </table>

  <?php 
    include_once "connect.php";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM ikan";
    $result = $conn->query($sql);
    $total = $result->num_rows;
    $conn->close();

    $total_page = ceil($total/$limit);

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM ikan LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);


    $conn->close();

    echo "<nav aria-label='Page navigation example'>
    <ul class='pagination'>
      <li class='page-item'><a class='page-link' href='ikan.php?page=".($page-1)."&limit=$limit&order=$order'>Previous</a></li>";
      for ($i=1; $i <= $total_page; $i++) { 
        if ($page == $i) {
          echo "<li class='page-item active'><a class='page-link' href='ikan.php?page=$i&limit=$limit&order=$order'>$i</a></li>";
        } else {
          echo "<li class='page-item'><a class='page-link' href='ikan.php?page=$i&limit=$limit&order=$order'>$i</a></li>";
        }
      }
      echo "<li class='page-item'><a class='page-link' href='ikan.php?page=".($page+1)."&limit=$limit&order=$order'>Next</a></li>";
    echo "<div class='dropdown'>";
    echo "<button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown'>
      Urutkan
    </button>
    <ul class='dropdown-menu'>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=$limit&order=jenis_ikan'>Jenis Ikan</a></li>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=$limit&order=komoditas'>Komoditas</a></li>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=$limit&order=habitat'>Habitat</a></li>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=$limit&order=pangan'>Jenis Pangan</a></li>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=$limit&order=id'>ID</a></li>
    </ul>
  </div>";
  echo "<div class='dropdown'>";
    echo "<button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown'>
      Tampilkan
    </button>
    <ul class='dropdown-menu'>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=10&order=$order'>10</a></li>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=25&order=$order'>25</a></li>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=50&order=$order'>50</a></li>
      <li><a class='dropdown-item' href='ikan.php?page=$page&limit=100&order=$order'>100</a></li>
    </ul>
  </div>";

    echo "</ul>
  </nav>";




    
    
    
   
  ?>

</div>

</body>
</html>
