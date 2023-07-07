<?php 
  include 'config.php'; 
  error_reporting(0);
  session_start();
 
  if (isset($_SESSION['username'])) {
    header("Location: Login.php");
  }
 
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
  if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
  
  if (!$result->num_rows > 0) {
    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";          
    $result = mysqli_query($conn, $sql);
  
  if ($result) {
    echo "<script>alert('Selamat, Pendaftaran berhasil!')</script>";
      $username = "";
      $email = "";
      $_POST['password'] = "";
      $_POST['cpassword'] = "";

    header("refresh:0; url=login.php");

    } else {
    echo "<script>alert('Terjadi kesalahan.')</script>";
    }
        
    } else {
    echo "<script>alert('Email Sudah Terdaftar.')</script>";
    }
         
    } else {
      echo "<script>alert('Password Tidak Sesuai')</script>";
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Temulaku - Daftar</title>
  <link rel="stylesheet" href="CSSRegister.css">
</head>

<style>
    .register-card {
    position: relative;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    width: 400px;
    max-width: 90%;
    animation: slide-up 0.5s ease;
    margin-top: 100px;
  }
</style>

<body>
  <div class="container">
    <div class="register-card">
      <div class="logo">
        <h1>TemuLaku</h1>
      </div>
      
      <div class="content">
        <h2>Daftar</h2>
          <form action="" method="POST">
            <div class="form-group">
              <label for="Email">Masukan Email</label>
                <input type="text" id="email" name="email" placeholder="Masukkan email anda" value="<?php echo $email; ?>" required>
            </div>
          
            <div class="form-group">
              <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username anda" value="<?php echo $username; ?>" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password anda" value="<?php echo $_POST['password']; ?>" required>
            </div>
          
            <div class="form-group">
              <label for="password">Ulang Password</label>
                <input type="password" id="password" name="cpassword" placeholder="Ulangi password anda" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>

            <div class="center-button">
              <button name="submit" class="submit">Daftar</button>
            </div>
          </form>
      </div>

      <div class="footer">
        <p>Sudah Punya Akun? <a href="login.php">Masuk</a></p>
      </div>

    </div>
  </div>
</body>
</html>
