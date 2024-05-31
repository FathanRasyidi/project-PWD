<?php
include 'koneksi.php';
session_start();
$op = "";

if (isset($_GET['pesan']) == 'logout') {
    $op = $_GET['pesan'];
} else {
    $op = "";
}

if ($op == 'logout') {
    echo "<script>alert('Anda telah berhasil logout');</script>";
    header("refresh: 0;url=index.php");
}

if (isset($_COOKIE['user']) &&!isset($_SESSION['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
    header("location:index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DishCovery</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="font/stylesheet.css"> <!-- Untuk font -->
    <link rel="stylesheet" href="index.css"> <!-- Untuk styling -->
</head>

<body>
    <header>
        <div class="brand">
            <img src="img/logo.png" alt="logo" width="40px">DishCovery
        </div>
        <nav>
            <a href="about.php">About Us</a>
            <?php if (empty($_SESSION['user'])) { ?>
            <a href="login.php" class="login" style="background-color: green;">Login</a>
            <?php } else { ?>
                <a href="logout.php" class="login" style="background-color: red;">Logout</a>
            <?php } ?>
        </nav>
    </header>
    <main>
        <section class="banner">
            <img src="img/cook1.jpg" alt="Banner Image">
            <h1>Temukan restoran <br> favorit anda.</h1>
        </section>
        <section class="resto-terdekat">
            <h2>Restoran Terbaik Di Dekat Anda</h2>
            <div class="resto-list">
                <?php 
                 $sql = "SELECT * FROM restoran ORDER BY id_resto ASC";
                 $q = mysqli_query($connect, $sql);
                 while ($r = mysqli_fetch_array($q)) { ?>
                <a href="detail.php?resto=<?php echo $r['id_resto']?>" style="text-decoration: none; color: black;">
                    <div class="resto-item">
                        <img src="img/grid<?php echo $r['id_resto']?>.jpg" alt="restoran">
                        <div class="resto-details">
                            <h3><?php echo $r['nama_resto'] ?></h3>
                            <p style="color: green; font-weight: bold;"><?php echo $r['jam']?></p>
                            <p style="color: black; opacity: 0.6; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?php echo $r['alamat'] ?></p>
                        </div>
                    </div>
                </a>
                <?php } ?>
            </div>
        </section>
    </main>
    <footer
        style="align-content: center; background-color: rgba(0, 0, 0, 0.3); text-align: center; color:white; height: 60px;">
        © 2024 SI-C. All rights reserved.
    </footer>

</body>

</html>