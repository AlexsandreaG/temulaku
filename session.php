<?php
    session_start();
    if($_SESSION['login']==false){
        echo "<script>alert('Silahkan login sebagai admin');</script>";
        header('location: login.php');
    }
?>