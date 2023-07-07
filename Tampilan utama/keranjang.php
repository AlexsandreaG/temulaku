<?php 
    require "config.php";

  session_start();
 
  if (!isset($_SESSION['username'])) {
    header("Location: ../Login Register/Login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TemuLaku Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <Link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>

<style>

    body{
        background-image : url("12.jpg");
        background-size: cover;
    }
    
  
    .no-decoration{
        color: white;
    }

    .gambar{
        width: 500px;
        height: 500px;
        margin-top: 10px;
        float: left;
        margin-right: 50px;
    }

    .padding{
        padding: 20px;
    }

    .margin{
        margin-left:-19px;
    }

    .ikon-search{
        margin-right: 5px;
        margin-top: 2px;
    }

    .terkait{
        object-fit: cover;
        object-position: center;
        height: 140px;
        width: 140px;
        margin-top: 7px;
        float: left;
        margin-right: 15px;
        border: 3px solid;
        border-color: #5443c3;
    }

    .mt{
        margin-top: 15px;
    }

    .float{
        float: none;
    }
    
    .submit{
        background-color: #5443c3;
        color: #ffffff;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-family: poppins;
        width: 130px;
        padding: 10px;
        margin-bottom: 20px;
        margin-top: 7px;
    }

    .poppins{
        font-family: poppins;
    }

    .poppins1{
        font-family: poppins medium;
    }

    .mt{
        margin-top: 20%;
        margin-left: 40%;
    }
</style>

<body>
<!-- Sidebar -->
  <div class="sidebar">
      <div class="logo">
        <i class="fa fa-shopping-bag"></i>
          <h2>TemuLaku</h2>
      </div>
    <div class="menu poppins">
      <ul>
        <li><a href="index.php" class="no-decoration"><i class="fa fa-home"></i> Toko</a></li>
        <li><a href="barang.php" class="no-decoration"><i class="no-decoration fa fa-shopping-basket"></i> Jual<a></li>
        <li><a href="../profile/index.php?action=<?php echo $_SESSION['username']; ?>" class="no-decoration"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="../Login Register/logout.php" class="no-decoration text-muted"><i class="no-decoration fa fa-sign-out-alt"></i> Keluar</a></li>
      </ul>
    </div>
  </div>

  <!-- Tampilan Cari -->
    <div class="content poppins1">
      <div class="top">
        <div class="search">
          <form method="get" action="index.php">
            <div>
              <input type="text" placeholder="Cari Barang" aria-label="Nama barang" aria-describedby="basic-addon2" name="keyword" class="poppins">
                <button>
                  <i class="fa-solid fa-magnifying-glass ikon-search"></i>
                </button>
            </div>
          </form>
        </div>

      <!-- Tampilan Nama Pojok -->
          <p class="marg1">Hai, apa kabar <strong><?php echo $_SESSION['username']; ?></strong> ?</p>
      </div>

  <!-- Makasi -->
    <div class="mt">
       <h1>Terimakasih .. </h1>
    </div>

</body>
</html>