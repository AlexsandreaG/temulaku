<?php 
  include 'config.php';
  error_reporting(0);
  session_start();
 
  if (isset($_SESSION['username'])) {
    header("Location: ../Tampilan utama/index.php");
  }
 
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
  
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      $_SESSION['email'] = $row['email'];
      header("Location: ../Tampilan utama/index.php");
    } 
    
    else {
      echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>TemuLaku - Login</title>
  <link rel="stylesheet" href="CSSLogin.css">
</head>

<style>
  button:hover{
    background-color: #052a4d;
  }
</style>

<body>
  <div class="alert alert-warning" role="alert">
    <?php echo $_SESSION['error']?>
  </div>

  <div class="container">
    <div class="login-card">
      <div class="logo">
        <h1>TemuLaku</h1>
      </div>
      
      <div class="content">
        <h2>Masuk</h2>
          <form action="" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Masukkan email anda" value="<?php echo $email; ?>" required>
            </div>
          
            <div class="form-group">
              <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password anda" value="<?php echo $_POST['password']; ?>" required>
            </div>
          
            <div class="center-button">
              <button name="submit" class="submit">Masuk</button>
            </div>
          </form>
      </div>
      
      <div class="footer">
        <p>Belum Punya Akun? <a href="register.php">Daftar</a></p>
      </div>
    </div>
  </div>
  
</body>
</html>
