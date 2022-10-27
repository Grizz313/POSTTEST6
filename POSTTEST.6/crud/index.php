<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <title>CREATE</title>
</head>

<body>
    <div class="back"><a href="../index.html"><i class="fa-solid fa-arrow-left"></i>MAIN PAGE</a></div>
    <div class="center">
        <h1>OUR NEW MEMBER</h1>
        <div class="link">
            <a href="tambah.php">+ &nbsp; Wanna Join Us?</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>About Yourself</th>
                <th>Image</th>
                <th>Last Seen</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM message ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    62+
                    <?php echo $row['phone']; ?>
                </td>
                <td><?php echo $row['tellme']; ?></td>
                <td style="text-align: center">
                    <img src="img/<?php echo $row['product']; ?>" style="width: 100px; height:100px;" />
                </td>
                <td>
                    <?php date_default_timezone_set("Asia/Makassar"); echo  date("Y.m.d"). " " . "<br>"
            . date("h:i:sa"); ?>
                </td>
                <td>
                    <a class="blue" href="edit_produk.php?id=<?php echo $row['id']; ?>"><i
                            class="fa-solid fa-pen-to-square"></i> EDIT</a> |
                    <a class="red" href="proses_hapus.php?id=<?php echo $row['id']; ?>"
                        onclick="return confirm('Anda yakin akan menghapus data ini?')"><i
                            class="fa-sharp fa-solid fa-trash"> Delete</i></a>
                </td>
            </tr>

            <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
        </tbody>
    </table>

</body>

</html>