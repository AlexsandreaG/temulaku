<?php
    require "../Tampilan utama/config.php";

    session_start();
    $username= htmlspecialchars($_GET['action']);
    if (!isset($_SESSION['username'])) {
      header("Location: ../Login Register/Login.php");
    }

    $query = mysqli_query($conn, "SELECT * FROM users where username='$username'");
    if($res = mysqli_fetch_array($query))
    {
      $username = $res['username'];
      $nama = $res['nama'];
      $email = $res['email'];
      $alamat = $res['alamat'];
      $ttl = date('Y-m-d', strtotime($res['ttl']));
      $nomor_hp = $res['nomor_hp'];
    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TemuLaku - Profil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="../Tampilan utama/css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <Link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
  </head>

  <style>

    .content{
        background-image: url("15.jpg");
        background-size: cover;
    }

    .no-decoration{
        color: white;
    }

    .gambar{
        width: 500px;
        height: 500px;
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
  
    .sidebar .menu ul li:first-child,
    .sidebar .menu ul li:hover:not(:last-child) {
        background: none;
        border-radius: 10px;
    }

    .input-1{
        padding: 10px;
        height: 38px;
        margin-top: -15px;
        font-size: 16px;
        border-radius: 5px;
    } 

    .alert {
        background-color: #5443c3;
        color: white;
        padding: 25px; 
        border-radius: 10px; 
        height:75px;
        width: 247px;
    }

    .top{
        margin-left:20px;
    }

    .font-size{
        font-size: 16px;
    }

    button{
        background-color: #5443c3;
        color: white;
        height: 55px;
        width: 200px;
        padding: 16px;
        margin-bottom: 80px;
    }
</style>

  <body>
    <?php require "navbar-admin.php";?>

    <div class="content">
      <div class="top">
        <div class="container">
          <h1>Profil</h1>
            <div class="profile-image">
              <button id="upload-button">
                <img src="../Tampilan utama/user(1).png" alt="Foto Profil" id="preview-image" />
              </button>
              <input type="file" id="file-input" style="display: none;">
            </div>

            <form action="" method="post" class="profile-form">
              <label for="username">Username</label>
                <input id="username" name="username" value="<?php echo $username; ?>" autocomplete="off" class="input-1" readonly>

              <label for="name">Nama</label>
                <input id="nama" name="nama" value="<?php echo $nama; ?>" autocomplete="off" class="input-1">

              <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" autocomplete="off" class="input-1">

              <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" cols="10" rows="2" autocomplete="off"><?php echo $alamat; ?></textarea>

              <label for="ttl">Tanggal Lahir</label>
                <input type="date" id="ttl" name="ttl" value="<?php echo $ttl; ?>" autocomplete="off" class="input-1">

              <label for="phone">Nomor Handphone</label>
                <input type="number" id="nomor_hp" name="nomor_hp" value="<?php echo $nomor_hp; ?>" autocomplete="off" class="input-1">

              <div class="button font-size">
                <button type="submit" name="simpan" class="font-size">Simpan perubahan</button>
              </div>
            </form>
          </div>

        <?php
                if(isset($_POST['simpan'])){
                    $username = htmlspecialchars($_POST['username']);
                    $nama = htmlspecialchars($_POST['nama']);
                    $email = htmlspecialchars($_POST['email']);
                    $alamat = htmlspecialchars($_POST['alamat']);
                    $ttl = htmlspecialchars($_POST['ttl']);
                    $nomor_hp = htmlspecialchars($_POST['nomor_hp']);

                    if($username==''){
                ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                    Username wajib diisi
                            </div>
                <?php
                    }
                    else{
                        $queryUpdate = mysqli_query($conn, "UPDATE users SET username='$username', nama='$nama', email='$email',
                        alamat='$alamat', ttl='$ttl', nomor_hp='$nomor_hp' where username='$username'");

                        if($queryUpdate){
                          ?>
                          <div class="alert" role="alert">
                              Profil berhasil diperbarui
                          </div>

                          <meta http-equiv="refresh" content="3" />
                          <?php
                         }

                      else{
                          echo mysqli_error($con);
                      }
                      
                    }
                  }
            ?>

      </div>
    </div>
  </body>
</html>
