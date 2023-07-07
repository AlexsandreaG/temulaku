<?php 
  require "config.php";
  session_start();
 
  if (!isset($_SESSION['username'])) {
    header("Location: ../Login Register/Login.php");
  }

  $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
  $jumlahKategori = mysqli_num_rows($queryKategori);

  $queryBarang = mysqli_query($conn, "SELECT * FROM barang");
  $jumlahBarang = mysqli_num_rows($queryBarang);

  $queryUsers = mysqli_query($conn, "SELECT * FROM users");
  $jumlahUsers = mysqli_num_rows($queryUsers);

  if(isset($_GET['keyword'])){
    $queryBarang = mysqli_query($conn, "SELECT * FROM barang WHERE nama LIKE '%$_GET[keyword]%'");
  }

  else if(isset($_GET['kategori'])){
    $queryGetKategoriId = mysqli_query($conn, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);
        
    $queryBarang = mysqli_query($conn, "SELECT * FROM barang WHERE kategori_id='$kategoriId[id]'");
  }

  else{
    $queryBarang = mysqli_query($conn, "SELECT * FROM barang");
  }

  $countData = mysqli_num_rows($queryBarang); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TemuLaku - Toko</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <Link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
  </head>
  
  <style>
    .no-decoration{
      text-decoration: none;
      color: white;
    }

    .content .product {
      width: 283px;
      float: left;
    }

    .content .categories .category {
      width: 33.3%;
      color: #fff;
      background: #5443c3;
      margin-right: 8px;
      border-radius: 5px;
      padding: 20px;
      text-align: center;
      margin-top:5px;
    }

    .title{
      margin-bottom: -9px;
      margin-top: 15px;
    }

    .price{
      text-align: left;
    }

    .poppins{
      font-family:poppins;
    }

    .kiri-nama {
      margin-left: 7px;
    }

    .ikon-search{
      margin-right: 5px;
      margin-top: 2px;
    }

    .pad{
      padding-left:20%;
      padding-right: 20%;
      padding-top: 15%;
    }

    .poppins-1{
      font-family: poppins;
      color: #a10000;
    }

    .circle {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: black;
        display: inline-block;
      }

      body{
        font-family: poppins;
        background-color: #E7E3FF;
        background-size: cover;
      }

      .sidebar .menu ul li:first-child, .sidebar .menu ul li:hover:not(:last-child) {
        background: none;
        border-radius: 10px;
      }

      .img-profile{
        width: 40px;
        height: 40px;
        margin-top: -8px;
        float: left;
      }

      .marg1{
        margin-right: 10px;
      }

      .ul li .dropdown{
        display: block;
        position: absolute;
        padding: 10px;
      }

      .link-container{
        display: none;
      }

      .list-group:hover .link-container{
        display: block;
        margin-left: -21px;
        color: black;
      }

      .link-group a:hover{
        transition: 2s;
        
      }
      .list-container{
        display: flex;
      }

      .nama-pojok{
        text-decoration: none;
        color: white;
        background: black;
        border-radius: 10px;
        padding: 10px;
      }

      .margin-2{
        margin-right: 80px;
        color: #5443c3;
      }
      
  </style>

  <body>

    <!-- Tampilan Sidebar -->
    <div class="sidebar">
      <div class="logo">
        <i class="fa fa-shopping-bag"></i>
          <h2>TemuLaku</h2>
      </div>
    <div class="menu">
      <ul>
        <li><a href="index.php" class="no-decoration"><i class="fa fa-home"></i> Toko</a></li>
        <li><a href="barang.php" class="no-decoration"><i class="no-decoration fa fa-shopping-basket"></i> Jual<a></li>
        <li><a href="../profile/index.php?action=<?php echo $_SESSION['username']; ?>" class="no-decoration"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="../Login Register/logout.php" class="no-decoration text-muted"><i class="no-decoration fa fa-sign-out-alt"></i> Keluar</a></li>
      </ul>
    </div>
    </div>

    <!-- Tampilan Cari -->
    <div class="content">
      <div class="top">
        <div class="search">
          <form method="get" action="index.php">
            <div>
              <input type="text" placeholder="Mau Cari Barang apa?" aria-label="Nama barang" aria-describedby="basic-addon2" name="keyword" class="poppins">
                <button>
                  <i class="fa-solid fa-magnifying-glass ikon-search"></i>
                </button>
            </div>
          </form>
        </div>

      <!-- Hiasan Notif -->
      <ul class="list-container">
        <div class="margin-2">
          <li class="">
            <i class="fas fa-bell fa-fw"></i>
              <span class="">4+</span>
                <h6 class="">
                  Notifikasi
                </h6>
          </li>
        </div>

      <!-- Tampilan Nama Pojok -->
        <p class="marg1 margin-left">Hai, apa kabar <strong><?php echo $_SESSION['username']; ?></strong> ?</p>
          <li class="list-group">
            <a href="../profile/index.php?action=<?php echo $_SESSION['username']; ?>"><img class="img-profile rounded-circle" src="user(1).png"></a>
            <ul class="link-container">
              <li class="link-group"><br>
                <a href="../profile/index.php?action=<?php echo $_SESSION['username']; ?>" class="nama-pojok">Edit</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>


      <!-- Tampilan Kategori -->
      <h2 id="heading">Kategori</h2>
        <div class="categories">
          <div class="category">
            <a href="index.php" class="no-decoration">Semua Produk</a>
          </div>

          <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
            <div class="category">
              <a class="no-decoration" href="index.php?kategori=<?php echo $kategori['nama']; ?>">
                <li class="list-group-item"><?php echo $kategori['nama']; ?></li></a>
            </div>
          <?php } ?>
        </div>

      <div class="all-products">
        <div class="title">
          <h2>Produk</h2>
        </div>

      <!-- Tampilan barang yang tidak ada -->  
      <?php if($countData<1){?>
        <h3 class="pad">Sayang sekali, kami tidak dapat menemukan barang yang anda cari ..</h3>
      <?php } ?>

      <!-- Menampilkan Perulangan Barang -->        
      <?php while($data = mysqli_fetch_array($queryBarang)){?>
        <div class="product">
            <i class="fa fa-shopping-cart"></i>
              <img src="../Admin/image/<?php echo $data['foto']; ?>" class="card-img" alt="...">  
            <div class="addbutton">
              <button class="addtocart" >
                <a href="barang-detail.php?nama=<?php echo $data['nama']; ?>" class="no-decoration poppins">Beli</a>
              </button>
            </div>

      <!-- Tampilan Nama Barang -->
          <div class="subtitle">
            <div class="name">
              <h4 class="card-title poppins kiri-nama"><?php echo $data['nama']; ?></h4>
            </div>              
          </div>

      <!-- Tampilan Harga Barang -->
            <div class="price kiri-nama poppins-1">
              <h4>Rp. <?php echo $data['harga']; ?></h4>
            </div>  
        </div>
      <?php } ?>
 
        </div>
      </div>
    
  </body>
</html>
