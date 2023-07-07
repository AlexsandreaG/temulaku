<?php

require "koneksi.php";
require "session.php";

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM barang a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahBarang = mysqli_num_rows($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryUsers = mysqli_query($con, "SELECT * FROM users");
    $jumlahUsers = mysqli_num_rows($queryUsers);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TemuLaku - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<style>
    body{
        font-family: poppins;
    }

    .bawah-dashboard{
        font-size:  21px;
    }

    .detail{
        font-size:  15x;
        font-family: poppins medium;
    }

    .font-logo{
        font-family: calderious;
        font-size: 21px;
    }

    .margin-bwh{
        padding-bottom: 5px;
    }

    .margin-kiri{
        margin-left: 15px;
    }

    .margin-kiri-2{
        margin-left: 23px;
    }

    .chart-1{
        width: 900px;
        height: 530px;
    }

    .row{
        overflow: auto;
    }

    .left{
        float: left;
        width: 50%;
    }

    .right{
        float: right;
        width: 30%;
        margin-left: -11%;
    }
</style>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3 font-logo">TemuLaku</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

                                 <li class="nav-item">
                <a class="nav-link" href="../../Tampilan utama/index-admin.php">
                    <i class="fas fa-fw fa-store fa-sm fa-fw"></i>
                    <span>Temulaku Toko</span></a>
            </li>

            <!-- Sidebar -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Lihat dan Edit</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kategori.php">Kategori</a>
                        <a class="collapse-item" href="barang.php">Barang</a>
                        <a class="collapse-item" href="users.php">Daftar Pengguna</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Tampilan cari -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Mau cari apa?"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">1+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                               
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Juli 7, 2023</div>
                                        Penambahan barang berhasil!
                                    </div>
                                </a>
                        
                                <a class="dropdown-item text-center small text-gray-500" href="#">Tampilkan semua Notifikasi</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Tampilan User Pojok -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai, apa kabar <strong><?php echo $_SESSION['username']; ?></strong> ? </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4"><H2>Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong> mau ngapain ?</H2>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Kategori yang Ada -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 margin-kiri">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 bawah-dashboard">
                                                Kategori yang tersedia</div>
                                            <div class="h5 mb-0 text-gray-800 margin-bwh">
                                                <?php echo $jumlahKategori; ?> kategori 
                                                
                                            </div>
                                            <p><a href="kategori.php" class="detail">Lihat detail</a></p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sort fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Barang yang Ada -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 margin-kiri">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 bawah-dashboard">
                                                Barang Ditambahkan</div>
                                            <div class="h5 mb-0 text-gray-800 margin-bwh">
                                                <?php echo $jumlahBarang; ?> barang
                                            </div>
                                            <p><a href="barang.php" class="detail">Lihat detail</a></p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Daftar Pengguna -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 margin-kiri">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 bawah-dashboard">
                                                Daftar Pengguna</div>
                                            <div class="h5 mb-0 text-gray-800 margin-bwh">
                                                <?php echo $jumlahUsers; ?> terdaftar
                                            </div>
                                            <p><a href="users.php" class="detail">Lihat detail</a></p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Row -->

                    <div class="row">
                        <!-- Bar Chart -->
                        <div class="col-xl-8 col-lg-7 margin-kiri-2 left">
                            <div class="card shadow mb-4 chart-1">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between margin-kiri">
                                    <h5 class="m-0 font-weight-bold text-primary bawah-dashboard">GRAFIK PENJUALAN BARANG BERDASAR KATEGORI</h5>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                        </div>
                                </div>
                                <!-- Card Body -->
                        <div class="card-body margin-kiri">
                            <div class="chart-area">
                                <div style="width: 800px; height: 800px;";>
                                    <canvas id="grafik"></canvas>
                                </div>
                                    <script>
                                        var ctx = document.getElementById("grafik").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data:{
                                                labels : ["Pakaian", "Elektronik", "Rumah Tangga", "Hobi", "Otomotif", "Kuliner"],
                                                datasets : [{
                                                    label: 'Jumlah ',
                                                    data: [
                                                        <?php
                                                        $koneksi = mysqli_connect("localhost", "root", "", "temulaku");
                                                        
                                                        $pakaian = mysqli_query($koneksi, "select * from barang where kategori_id=1");
                                                        echo mysqli_num_rows($pakaian);
                                                        ?>,

                                                        <?php
                                                        $elektronik = mysqli_query($koneksi, "select * from barang where kategori_id=2");
                                                        echo mysqli_num_rows($elektronik);
                                                        ?>,

                                                        <?php
                                                        $rt = mysqli_query($koneksi, "select * from barang where kategori_id=3");
                                                        echo mysqli_num_rows($rt);
                                                        ?>,

                                                        <?php
                                                        $hobi = mysqli_query($koneksi, "select * from barang where kategori_id=4");
                                                        echo mysqli_num_rows($hobi);
                                                        ?>,

                                                        <?php
                                                        $otomotif = mysqli_query($koneksi, "select * from barang where kategori_id=5");
                                                        echo mysqli_num_rows($otomotif);
                                                        ?>,

                                                        <?php
                                                        $kuliner = mysqli_query($koneksi, "select * from barang where kategori_id=6");
                                                        echo mysqli_num_rows($kuliner);
                                                        ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(255, 155, 132, 1)',
                                                        'rgba(255, 99, 132, 1)'
                                                    ],
                                                    
                                                    borderWidth:1
                                                }]
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right">
                        <?php require "pie.php"?>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; TemuLaku 2023</span>
                    </div>
                </div>
            </footer>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admin mau keluar nih ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>