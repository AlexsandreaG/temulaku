<?php
    session_start();
    require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TemuLaku - Admin Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<style>
    .main{
        height: 100vh;
    }

    .login-box{
        width: 500px;
        height: 420px;
        box-sizing: border-box;
        border-radius: 10px;
        position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
    }

    h2{
        font-family:"calderious";
        font-size: 45px;
        color: black;
        text-align: center;
        margin-bottom:26px;
    }

    div{
        font-family:"poppins";
    }

    label{
        margin-top:17px;
        margin-bottom:2px;
    }

    body {
        background: linear-gradient(to right, #00416A, #E4E5E6);
    } 

    .btn{
        background-color: #00416A;
        padding: 15px;
        width: 50%;   
    }

    .btn:hover{
        background-color: #052a4d;
        text-align: center;
    }

    input{
        width: 20px;
        margin-top: 3px;
    }

    .sbmt{
        text-align: center;
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box">
            <form action="" method="post">
                <h2>TemuLaku</h2>
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="sbmt">
                    <button class="btn btn-primary form-control mt-4 p-2" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-3">
            <?php
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                    
                    if($countdata>0){
                        if (password_verify($password, $data['password'])){
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: ../dashboard/index.php');
                        }
                        else{
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Password salah
                            </div>
                            <?php
                        }          
                    }
                    else{
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Akun tidak tersedia
                    </div>
                
                    <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>