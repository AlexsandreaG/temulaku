<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TemuLaku Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />

    <Link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
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

  .poppins{
    font-family: poppins;
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
  }


  .margin{
    margin-right: 25px;
    margin-left: -32px;
  }

  .logo{
    font-size: 24px;
    margin-top: -2px;
    margin-left: 2px;
  }

  .logo-tulisan{
    font-weight: bold;
    margin-top: 5px;
    margin-left: 3px;
  }

  .sidebar .menu ul li:first-child {
    background: none;
    border-radius: none;
  }
  </style>

  <body>

  <!-- Tampilan Sidebar -->
    <div class="sidebar">
      <div class="logo">
        <i class="fa fa-shopping-bag logo"></i>
          <h2 class="logo-tulisan">TemuLaku</h2>
      </div>
      <div class="menu no-decoration">
        <ul>
          <li><a href="index.php" class="no-decoration"><i class="fa fa-home margin"></i> Toko</a></li>
          <li><a href="barang.php" class="no-decoration"><i class="fa fa-shopping-basket margin"></i> Jual<a></li>
          <li><a href="../profile/index.php?action=<?php echo $_SESSION['username']; ?>" class="no-decoration"><i class="fa fa-user margin"></i> Profile</a></li>
          <li><a href="../Login Register/logout.php" class="no-decoration"><i class="fa fa-sign-out-alt margin"></i> Keluar</a></li>
        </ul>
      </div>
    </div>

    <script src="fontawesome/js/all.min.js"></script>
  </body>
</html>
