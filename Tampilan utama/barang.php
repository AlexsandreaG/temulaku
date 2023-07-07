<?php
    require "config.php";
    session_start();
 
    if (!isset($_SESSION['username'])) {
      header("Location: ../Login Register/Login.php");
    }

    $query = mysqli_query($conn, "SELECT a.*, b.nama AS nama_kategori FROM barang a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahBarang = mysqli_num_rows($query);

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");

    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZFAFSAIAOSJIASJF8Y492FH20H2F0H02H0F2H32F3H0FH230H2F03HF032H0F32HFENF';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString = $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Temulaku - Jual</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <Link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <Link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <Link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    body{
        font-family:"poppins";
        color: black;
        background-image : url("12.jpg");
        background-size: cover;
        background-position-x: -87%;
    }

    .no-decoration{
        text-decoration: none;
    }

    .kanan{
        margin-right:6px;
    }

    form div{
        margin-bottom:10px;
    }

    .mb{
        margin-bottom: 15px;
    }

    .lebar{
        width: 440px;
    }

    .lebar1{
        width: 270px;
    }

    .back{
        background-color: navy;
    }
</style>

<body>
<?php require "navbar.php";?>

<div class="content">
    <div class="top">    

    <!-- Menambahkan barang -->
    <div class="my-5 col-12 col-md-6">
        <h2><strong>Jual Barang Kamu</strong></h2>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama" class="mt-3">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control mt-1 mb lebar" autocomplete=off>
            </div>
            <div>
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control mt-1 mb lebar">
                    <option value="">Pilih salah satu</option>
                    <?php
                        while($data=mysqli_fetch_array($queryKategori)){
                            ?>
                                <option value="<?php echo $data['id'];?>"><?php echo $data['nama']; ?></option>
                    <?php
                        }
                        ?>
                </select>
            </div>
            <div>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control mt-1 mb lebar1">
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" class="form-control mt-1 mb lebar" name="harga" id="harga">
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>  
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control lebar mt-1 mb"></textarea>
            </div>
            <div>
                <label for="ketersediaan">Ketersediaan</label>  
                <select name="ketersediaan" id="ketersediaan" class="form-control mt-1 mb lebar">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Habis">Habis</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-1" name="simpan">Tambah</button>
            </div>
        </form>

        <?php
            if(isset($_POST['simpan'])){
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $deskripsi = htmlspecialchars($_POST['deskripsi']);
                $ketersediaan = htmlspecialchars($_POST['ketersediaan']);

                $target_dir = "../Admin/image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if($nama=='' || $kategori=='' ){
        ?>
                <div class="alert alert-warning mt-3" role="alert">
                    Nama dan kategori wajib diisi
                </div>
        <?php
                }
                else{
                    if($nama_file!=''){
                        if($image_size > 50009000){
        ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Foto tidak boleh lebih dari 5 MB
                            </div>
        <?php
                        }
                    else{
                        if($imageFileType != 'jpg' && $imageFileType != 'png'){
        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Foto wajib bertipe jpg atau png
                        </div>
        <?php
                        }
                        else{
                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                        }
                    }
                }

                $queryTambah = mysqli_query($conn, "INSERT INTO barang (kategori_id, nama, foto, harga, deskripsi, ketersediaan) 
                VALUES ('$kategori', '$nama', '$new_name', '$harga', '$deskripsi', '$ketersediaan')");

                if($queryTambah){
        ?>
                <div class="alert alert-primary mt-3" role="alert">
                    Barang berhasil ditambahkan
                </div>

                <meta http-equiv="refresh" content="3; url=index.php" />
        <?php
                }
                else{
                    echo mysqli_error($conn);
                }
            }
        }
        ?>
        </div>
    </div>
</div>

</body>
</html>