<?php
   require "session.php";
    require "koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TemuLaku - Kategori</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    body{
        font-family: poppins;
    }

    .margin-kiri{
        margin-left: 14px;
        margin-right: 15px;
    }

    .input{
        width: 280px;
        margin-bottom: -5px;
        margin-top: 15px;
    }

    .font-logo{
        font-family: calderious;
        font-size: 21px;
    }
</style>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3 font-logo">TemuLaku</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                    <a class="nav-link" href="../../Tampilan utama/index-admin.php">
                    <i class="fas fa-fw fa-store"></i>
                    <span>TemuLaku Toko</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Lihat dan Edit</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kategori.php">Kategori</a>
                        <a class="collapse-item" href="barang.php">Barang</a>
                        <a class="collapse-item" href="users.php">Pengguna Terdaftar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Grafik</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
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

                    <!-- Topbar Search -->
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

                        <!-- Nav Item - User Information -->
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
                                <a class="dropdown-item" href="logout.php">
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

                        <nav aria-label="breadcrumb ll">
                            <ol class="breadcrumb ll">
                                <li class="breadcrumb-item active ll" aria-current="page">
                                    <a href="index.php" class="no-decoration ll">
                                    <i class="fa-solid fa-house-laptop kanan"> </i> Home</a>
                                </li>
                                
                                <li class="breadcrumb-item ll" aria-current="page">
                                <a href="kategori.php" class="no-decoration ll">
                                 Kategori
                                </a>
                                </li>
                            </ol>
                        </nav>
                        
                        <div class="my-5 col-md-6">
                            <h2>Tambah Kategori</h2>
                
                            <form action="" method="post">
                                <div>
                
                                    <input type="text" id="kategori" name="kategori" placeholder=".." class="form-control input">
                                </div>
                                <div>
                                    <button class="btn btn-primary mt-3" type="submit" name="simpan_kategori">Tambah</button>
                                </div>
                            </form>
                
                            <?php
                                if(isset($_POST['simpan_kategori'])){
                                    $kategori = htmlspecialchars($_POST['kategori']);
                                
                                    $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                                    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);
                
                                    if($jumlahDataKategoriBaru > 0){
                                        ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            Kategori sudah ada
                                        </div>
                                        <?php
                                    }
                                    else{
                                        $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                
                                        if($querySimpan){
                                            ?>
                                            <div class="alert alert-primary mt-3" role="alert">
                                                Kategori berhasil ditambahkan
                                            </div>
                
                                            <meta http-equiv="refresh" content="1; url=kategori.php" />
                                            <?php
                
                                        }
                                        else{
                                            echo mysqli_error($con);
                                        }
                                    }
                                }
                                
                            ?>
                
                        </div>
                
                
                
                        <div class="mt-3 margin-kiri">
                            <h2>List Kategori</h2>
                
                            <div class="table-responsive mt-4 ll">
                                <table class="table kk ll">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID</th>
                                            <th>Nama</th>\
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                             if($jumlahKategori==0){
                                        ?>
                                            <tr>
                                                <td>Tidak ada data kategori</td>
                                            </tr>
                
                                        <?php 
                                            }
                                            else{} 
                                            $jumlah = 1;
                                            while($data=mysqli_fetch_array($queryKategori)){
                                        ?> 
                                                <tr>
                                                    <td><?php echo $jumlah;?></td>
                                                    <td><?php echo $data['id'];?></td>
                                                    <td><?php echo $data['nama'];?></td>
                                                    <td>
                                                        <a href="kategori-detail.php?action=<?php echo $data['id']; ?>" class="btn btn-info no-decoration">
                                                        <i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
                                                    </td>
                                                </tr>
                                        <?php  
                                                $jumlah++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="../fontawesome/js/all.min.js"></script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; TemuLaku 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>