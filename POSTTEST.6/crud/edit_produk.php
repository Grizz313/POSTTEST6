<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM message WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <title>CRUD</title>

</head>

<body>
    <div class="center">
        <h1>Edit Product</h1>
        <div class="link">
            <a href="index.php">Go Back</a>
        </div>
    </div>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
        <section class="base">
            <!-- menampung nilai id produk yang akan di edit -->
            <input name="id" value="<?php echo $data['id']; ?>" hidden />
            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $data['name']; ?>" autofocus="" required="" />
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $data['email']; ?>" />
            </div>
            <div>
                <label>Phone Number</label>
                <input type="text" name="phone" required="" value="<?php echo $data['phone']; ?>" />
            </div>
            <div>
                <label>About Yourself</label>
                <input type="text" name="tellme" required="" value="<?php echo $data['tellme']; ?>" />
            </div>
            <div>
                <label>New Product</label>
                <img src="img/<?php echo $data['product']; ?>"
                    style="width: 120px;float: left;margin-bottom: 5px;">
                <input type="file" name="product" />
                <i style="float: left;font-size: 11px;color: red">ignore to not change the product image</i>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
        </section>
    </form>
</body>

</html>