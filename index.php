<?php
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
                <a href="detail1.php" style="text-decoration: none; color: black;">
                    <div class="resto-item">
                        <img src="img/tm.jpg" alt="restoran">
                        <div class="resto-details">
                            <h3>Eastern Kopi TM Seturan</h3>
                            <p style="color: green; font-weight: bold;">09:00 - 22:00</p>
                            <p style="color: black; opacity: 0.6;">Jl. Seturan Raya No.A9-10, Kledokan, Caturtunggal.</p>
                        </div>
                    </div>
                </a>
                <a href="detail2.php" style="text-decoration: none; color: black;">
                    <div class="resto-item">
                        <img src="img/gacoan.jpg" alt="restoran">
                        <div class="resto-details">
                            <h3>Mie Gacoan Babarsari</h3>
                            <p style="color: green; font-weight: bold;">09:00 - 21:00</p>
                            <p style="color: black; opacity: 0.6;">Jl. Babarsari Ruko Raflesia Blok B7-B10, Caturtunggal</p>
                        </div>
                    </div>
                </a>
                <a href="detail3.php" style="text-decoration: none; color: black;">
                    <div class="resto-item">
                        <img src="img/suharti.jpg" alt="restoran">
                        <div class="resto-details">
                            <h3>Ayam Goreng Suharti</h3>
                            <p style="color: green; font-weight: bold;">08:00 - 21:00</p>
                            <p style="color: black; opacity: 0.6;">Jl. Laksda Adisucipto No.208, Janti, Caturtunggal.</p>
                        </div>
                    </div>
                </a>
                <a href="detail4.php" style="text-decoration: none; color: black;">
                    <div class="resto-item">
                        <img src="img/ft.jpg" alt="restoran">
                        <div class="resto-details">
                            <h3>Food Truck Barsa City</h3>
                            <p style="color: green; font-weight: bold;">15:00 - 23:30</p>
                            <p style="color: black; opacity: 0.6;">Ngentak, Caturtunggal, Kec. Depok, Kabupaten Sleman.</p>
                        </div>
                    </div>
                </a>
                <a href="detail5.php" style="text-decoration: none; color: black;">
                    <div class="resto-item">
                        <img src="img/otw.jpg" alt="restoran">
                        <div class="resto-details">
                            <h3>OTW Ramen</h3>
                            <p style="color: green; font-weight: bold;">11:00 - 21:00</p>
                            <p style="color: black; opacity: 0.6;">Jl. Sukun Raya No.8, Jaranan, Banguntapan.</p>
                        </div>
                    </div>
                </a>
                <a href="detail6.php" style="text-decoration: none; color: black;">
                    <div class="resto-item">
                        <img src="img/jco.jpg" alt="restoran">
                        <div class="resto-details">
                            <h3>J.Co - Plaza Ambarrukmo</h3>
                            <p style="color: green; font-weight: bold;">10:00 - 22:00</p>
                            <p style="color: black; opacity: 0.6;">A - 35 Plaza Ambarukmo, Jl. Laksda Adisucipto.</p>
                        </div>
                    </div>
                </a>
                <a href="detail7.php" style="text-decoration: none; color: black;">
                    <div class="resto-item">
                        <img src="img/mcd.jpg" alt="restoran">
                        <div class="resto-details">
                            <h3>McDonald's Ambarukmo</h3>
                            <p style="color: green; font-weight: bold;">24 Jam</p>
                            <p style="color: black; opacity: 0.6;">Jl. Laksda Adisucipto No.21, Ambarukmo, Caturtunggal.</p>
                        </div>
                    </div>
                </a>
                <!--- kalau mau ditambah --->
            </div>
        </section>
    </main>
    <footer
        style="align-content: center; background-color: rgba(0, 0, 0, 0.3); text-align: center; color:white; height: 60px;">
        © 2024 SI-C. All rights reserved.
    </footer>

</body>

</html>