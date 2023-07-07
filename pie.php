<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TemuLaku</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

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



    .chart-2{
        width: 500px;
        height: 530px;
    }


    .row{
        overflow: auto;
    }

    .left{
        float: left;
        width: 70%;
    }

    .right{
        float: right;
        width: 30%;
    }
    </style>

<div class="col-xl-8 col-lg-7 left">
                            <div class="card shadow mb-4 chart-2">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold text-primary bawah-dashboard">GRAFIK - 2</h5>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                        </div>
                                </div>
                                <!-- Card Body -->
                        <div class="card-body margin-kiri">
                            <div class="chart-area">
                                <div style="width: 400px; height: 400px;";>
                                    <canvas id="grafik2"></canvas>
                                </div>
                                    <script>
                                        var ctx = document.getElementById("grafik2").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'pie',
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


</body>
</html>