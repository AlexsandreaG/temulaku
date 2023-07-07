<?php
    require "session.php";
    require "koneksi.php";

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM barang a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahBarang = mysqli_num_rows($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TemuLaku - Barang</title>

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
        margin-top: 16px;
    }

    .lebar2{
        width: 420px;
        margin-bottom: 15px;
        margin-top: -5px;
    }

    .left{
        float: left;
        width: 29%;
        margin-left: 2%;
        margin-top: 10px;
    }

    .right{
        float: right;
        width: 65%;
        margin-left: 10px;
        margin-right: 3%;
        margin-top: 10px;
    }

    .table{
        background-color: whitesmoke;
        margin-top: 5px;
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
                <a class="nav-link" href="tables.html">
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

                

                <nav aria-label="breadcrumb" class="">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="index.php" class="no-decoration">
                            <i class="fa-solid fa-house-laptop kanan"> </i> Home</a>
                        </li>
                
                        <li class="breadcrumb-item" aria-current="page">
                        <a href="barang.php" class="no-decoration">
                            Barang</a>
                        </li>
                    </ol>
                </nav>



        <!-- tambah barang -->
        <div class="left">
        <h3>Tambahkan Barang</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama" class="mt-3">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control lebar2" autocomplete=off>
            </div>
            <div>
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control lebar2">
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
                <input type="file" name="foto" id="foto" class="form-control lebar2">
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" class="form-control lebar2" name="harga" id="harga">
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>  
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control lebar2"></textarea>
            </div>
            <div>
                <label for="ketersediaan">Ketersediaan Stok</label>  
                <select name="ketersediaan" id="ketersediaan" class="form-control lebar2">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Habis">Habis</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-1" name="simpan">Simpan</button>
            </div>
        </form>

        <?php
            if(isset($_POST['simpan'])){
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $deskripsi = htmlspecialchars($_POST['deskripsi']);
                $ketersediaan = htmlspecialchars($_POST['ketersediaan']);

                $target_dir = "../image/";
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

                $queryTambah = mysqli_query($con, "INSERT INTO barang (kategori_id, nama, foto, harga, deskripsi, ketersediaan) 
                VALUES ('$kategori', '$nama', '$new_name', '$harga', '$deskripsi', '$ketersediaan')");

                if($queryTambah){
        ?>
                <div class="alert alert-primary mt-3" role="alert">
                    Barang berhasil ditambahkan
                </div>

                <meta http-equiv="refresh" content="2; url=barang.php" />
        <?php
                }
                else{
                    echo mysqli_error($con);
                }
            }
        }
        ?>
        
        </div>
        <div class="atas right">
            <h3 class="atas">List Barang</h3>

            <div class="table-responsive mt-4 hw"></div>
                <table class="table hw">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Kategori </th>
                            <th>Harga </th>
                            <th>Status </th>
                            <th>Edit - Lihat</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if($jumlahBarang==0){
                        ?>
                            <tr>
                                <td colspan=6 class="text-center">Data barang tidak tersedia</td>
                            </tr>
                        <?php
                            }
                            else{
                       $jumlah = 1;
                    while($data=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                                <td><?php echo $data['ketersediaan']; ?></td>
                                <td>
                                        <a href="barang-detail.php?action=<?php echo $data['id']; ?>"
                                        class="btn btn-info bg"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="../../Tampilan utama/barang-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-info bg no-decoration">
                                        <i class="fa-sharp fa-regular fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php
                            $jumlah++;
                                   }     
                                

                             }
                        ?>
                    </tbody>
            </table>
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