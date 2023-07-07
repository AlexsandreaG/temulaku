<?php 
  require "../Tampilan utama/config.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TemuLaku Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <Link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
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

    .poppins-1{
    font-family: montserrat;
  }

  @import url(https://fonts.googleapis.com/css?family=MuseoModerno);

* {
  margin: 0;
  padding: 0;
  transition: 0.5s all;
  box-sizing: border-box;
  text-decoration: none;
  border: none;
  outline: none;
  list-style: none;
}

html,
body {
  width: 100%;
  height: 100%;
}

body {
  font-family: "MuseoModerno";
  display: flex;
  overflow: hidden;
}

button {
  cursor: pointer;
}

.sidebar {
  width: 250px;
  background: #5443c3;
  border-radius: 0 30px 30px 0;
  padding: 30px;
}

#mobile-menu {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  z-index: -8888;
}

#mobile-menu:checked + .sidebar {
  transform: translate(280px);
  z-index: 1;
}

#mobile-menu:checked + .sidebar + #mmenu {
  transform: translate(50px);
  color: #fff;
}

#mobile-menu:checked + .sidebar + #mmenu i:first-child {
  visibility: hidden;
  position: absolute;
  opacity: 0;
  top: -50%;
}

#mobile-menu:checked + .sidebar + #mmenu i:last-child {
  position: absolute;
  visibility: visible;
  opacity: 1;
  top: unset;
}

#mmenu i:last-child {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  top: -50%;
}

#mmenu {
  padding: 15px;
  opacity: 0;
  position: absolute;
  font-size: 22px;
}

.sidebar .logo {
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
}

.sidebar .logo i,
.sidebar .logo h2 {
  font-size: 24px;
  padding: 4px;
}

.sidebar .menu {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 70px 0;

}

.sidebar .menu ul li {
  padding: 13px 15px;
  padding-right: 30px;
  letter-spacing: 0.05px;
  margin: 15px 0;
  color: #fff;
  font-size: 15px;
  cursor: pointer;
}

.sidebar .menu ul li:first-child,
.sidebar .menu ul li:hover:not(:last-child) {
  background: none;
  border-radius: 10px;
}

.sidebar .menu ul li:last-child {
  position: absolute;
  bottom: 0;
}

.sidebar .menu ul li i {
  margin-right: 25px;
}

.content {
  flex: 1;
  padding: 35px 45px;
  overflow-x: overlay;
}

.content .top {
  display: flex;
  justify-content: space-between;
}

.content .top .search {
  position: relative;
}

.content .top .search input {
  background: #ddd9f2;
  padding: 10px 150px;
  border-radius: 6px;
  font-weight: 600;
  padding-left: 15px;
}

.content .top .search i {
  position: absolute;
  right: 10px;
  top: 25%;
  color: #5443c3;
  cursor: pointer;
}

.content .top .user i {
  padding: 0 10px;
  color: #5443c3;
  font-size: 20px;
  cursor: pointer;
}

.content .categories {
  width: 100%;
  display: flex;
}

.content #heading {
  padding-top: 30px;
  color: #5443c3;
}

.content .categories .category {
  width: 33.3%;
  color: #fff;
  background: #5443c3;
  margin-right: 8px;
  border-radius: 10px;
  padding: 14px;
  align-items: center;
  text-align: center;
}

.content .categories .category img {
  padding: 5px 15px;
  float: right;
  padding-bottom: 0;
  opacity: 0.6;
}

.content .all-products {
  width: 100%;
}

.content .all-products .title {
  padding: 15px 0;
  color: #5443c3;
}

.content .products {
  width: 100%;
  display: flex;
}

.content .product {
  width: 33.3%;
  position: relative;
  margin: 5px 5px;
  padding: 15px;
  background: #f6f5fb;
  text-align: center;
}

.content .product:hover::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  background: rgba(255, 255, 255, 0.6);
}

.content .product:hover .addbutton {
  visibility: visible;
  opacity: 1;
  bottom: 50%;
  transform: translate(-50%, -50%);
  transition: all 0.5s;
  left: 50%;
}

.addbutton {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  transition: all 0.5s;
}

.addbutton button {
  padding: 5px 25px;
  color: #fff;
  border-radius: 5px;
  background: #5453c3;
}

.content .product img {
  padding: 10px;
  width: 125px;
  height: 130px;
}

.content .product i {
  float: right;
  color: #b5b4ba;
}

.content .product .subtitle {
  display: flex;
  justify-content: space-between;
}

.content .product .price h1 {
  font-size: 20px;
}

/* Responsive */

@media (max-width: 768px) {
  .sidebar {
    margin-left: -295px;
  }

  .content {
    width: 100%;
    margin: 5px;
  }

  .sidebar + #mmenu {
    transform: translate(50px);
  }

  .content .top {
    flex-direction: column;
  }

  .content .search {
    padding-bottom: 25px;
  }

  #mmenu {
    opacity: 1;
    visibility: visible;
    z-index: 2;
    color: #000;
    position: relative;
  }

  .menu a{
    color: white;
    text-decoration: none;
  }

  .content .products {
    display: block;
  }

  .content .product {
    width: 100%;
  }

  .content .top .search input {
    padding: 10px 45px;
  }

  .content .top .search i {
    top: 16%;
  }

  .content .categories {
    display: block;
  }

  .content .categories .category {
    width: 100%;
    margin-top: 5px;
  }

  .content .categories .category img {
    display: none;
  }

  .user {
    display: flex;
  }
}
  </style>

  <body>
    <!-- Tampilan Sidebar -->
    <div class="sidebar">
      <div class="logo">
        <i class="fa fa-shopping-bag"></i>
          <h2>TemuLaku</h2>
      </div>
      <div class="menu">
        <ul>
          <li><a href="../Tampilan utama/index-admin.php" class="no-decoration"><i class="fa fa-home"></i> Toko</a></li>
          <li><a href="../Tampilan utama/barang-admin.php" class="no-decoration"><i class="no-decoration fa fa-shopping-basket"></i> Jual<a></li>
          <li><a href="../profile/index-admin.php?action=<?php echo $_SESSION['username']; ?>" class="no-decoration"><i class="fa fa-user"></i> Profile</a></li>
          <li><a href="../Admin/dashboard/index.php" class="no-decoration text-muted"><i class="fa fa-cog"></i> Admin</a></li>
          <li><a href="../Admin/dashboard/logout.php" class="no-decoration text-muted"><i class="no-decoration fa fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
      </div>
    </div>
  </body>
</html>
