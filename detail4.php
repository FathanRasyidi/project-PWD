<?php
include 'koneksi.php';
session_start();
$user_session = empty($_SESSION['user']) ? '' : $_SESSION['user'];

if (isset($_GET["op"])) {
    $op = $_GET["op"];
} else {
    $op = "";
}

if ($op == "delete") {
    $id = $_GET["id"];
    //untuk menghapus gambar jika ada
    $sql2 = "SELECT image FROM review WHERE id = '$id'";
    $q2 = mysqli_query($connect, $sql2);
    $row = mysqli_fetch_assoc($q2);
    $imagePath = isset($row['image']) ? $row['image'] : '';
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    //hapus data
    $sql1 = "delete from review where id = '$id'";
    $q1 = mysqli_query($connect, $sql1);

    if ($q1) {
        $sukses = "Berhasil menghapus data";
        header("refresh:0;location:detail4.php"); // jangan lupa ini diganti --------------------------------
    } else {
        $error = "Gagal menghapus data";
    }

}

if ($op == 'ulasan_sukses') {
    echo "<script>alert('Data berhasil ditambahkan');</script>"; // jangan lupa ini juga diganti --------------------------------
    header("refresh: 0;url=detail4.php");
} else if ($op == 'ulasan_edit') {
    echo "<script>alert('Data berhasil diubah');</script>"; // jangan lupa ini juga diganti --------------------------------
    header("refresh: 0;url=detail4.php");
}

// untuk rata rata rating
$sql = "SELECT rating FROM review WHERE id_resto = 4"; // jangan lupa ini juga diganti idnya --------------------------------
$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
    $total_rating = 0;
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $total_rating += $row["rating"];
        $i++;
    }
    $average_rating = $total_rating / $i;
    $average_rating = round($average_rating, 1);
} else {
    $average_rating = "-";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Truck Barsa City</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="font/stylesheet.css"> <!-- Untuk font -->
    <link rel="stylesheet" href="index.css"> <!-- Untuk styling -->
    <style>
        .container {
            padding: 20px;
            margin: 60px;
            margin-top: 0px;
        }

        .fitur {
            background-color: #eee;
            border: 2px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .restaurant-info {
            margin-bottom: 20px;
        }

        .restaurant-info h1 {
            margin: 0;
        }

        .tags {
            margin: 10px 0;
        }

        .tags span {
            background-color: #eee;
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 4px;
        }

        .info,
        .review-section {
            margin-top: 0px;
        }

        .info .item {
            display: inline-block;
            width: 45%;
            margin-bottom: 10px;
        }

        .info .item span {
            background-color: #eee;
            display: flex;
            align-items: center;
            padding: 5px;
            border-radius: 4px;
        }

        .review-section h2 {
            margin: 0 0 0 0;
        }

        .review {
            margin-bottom: 20px;
            margin: 20px;
        }

        .review-grid {
            background-color: white;
            border: 2px solid #ddd;
            padding: 20px;
            padding-top: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
            position: relative;
        }

        #pesan-edited {
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .review-img {
            width: 250px;
            height: 250px;
            object-fit: contain;
            margin-right: 10px;
            border-radius: 15px;
            border: 2px solid #ddd;
        }

        .user-img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .review p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

    <header>
        <div class="brand">
            <img src="img/logo.png" alt="logo" width="40px">DishCovery
        </div>
        <nav>
            <a href="index.php" style="font-weight: bold;">Home</a>
            <?php if (empty($_SESSION['user'])) { ?>
                <a href="login.php" class="login" style="background-color: green;">Login</a>
            <?php } else { ?>
                <a href="logout.php" class="login" style="background-color: red;">Logout</a>
            <?php } ?>
        </nav>
    </header>

    <section class="banner">
        <img src="img/ft1.jpg" alt="Banner Image" style="filter: brightness(100%)"> <!-- jangan lupa ini fotonya juga diganti -------------------------------- -->
    </section>

    <main>
        <div class="container">
            <div class="restaurant-info">
                <h1>Food Truck Barsa City</h1>
                <p
                    style="float: right; margin-top: -40px; background-color: green; border-radius: 10px; display: inline-block; padding: 7px 7px; color: white;">
                    ⭐ <?php echo $average_rating ?></p>
                <p style="opacity: 0.8; margin-top: 0px; margin-bottom: 0px;">Ngentak, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.</p>
                <p style="font-weight: bold; margin-top: 0px;">081335953355</p>
                <div class="tags">
                    <span>Coffee</span>
                    <span>Smoothies</span>
                    <span>Snacks</span>
                </div>
                <p style="margin-bottom: 0px; opacity: 0.8">Buka : Senin,15.00-23.30</p>
                <p style="margin-top: 0px; opacity: 0.8">Rp. 10.000 - Rp. 40.000</p>
                <a href="https://maps.app.goo.gl/3RWJJP4bNFtZ6KXS6" target="_blank"> <!--- maps linknya -------------------------------------------->
                    <button
                        style="border-radius: 10px; border: 2px solid green; padding: 10px 20px; background-color: transparent; color: green; text-decoration: none; font-family: 'Trip Sans'; font-weight: bold; font-size: 16px"
                        onmouseover="this.style.backgroundColor='green'; this.style.color='white'"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='green'">Maps</button>
                </a>
            </div>

            <section class="fitur">
                <h2 style="margin-top: 0px;">Layanan</h2>
                <div class="info">
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Drive-through</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Dessert</span>
                    </div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Makan di
                            tempat</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px"
                                style="margin-right: 10px">Salad prasmanan</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Live Musik</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Q-RIS</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Banyak
                            tempat parkir</span></div>
                </div>
            </section>

            <section class="fitur">
                <div class="contribute">
                    <h2 style="margin-top: 0px;">Contribute</h2>
                    <?php if (empty($_SESSION['user'])) { ?>
                        <a href="login.php?pesan=belum_login"> <!--- pesan=logindulu --->
                        <?php } else { ?>
                        <a href="ulas.php?resto=4"> <!-- id resto jgn lupa ---------------------------------------------->
                            <?php } ?>
                            <button
                                style="border-radius: 10px; border: 2px solid black; padding: 10px 20px; background-color: transparent; color: black; text-decoration: none; font-family: 'Trip Sans'; font-weight: bold; font-size: 16px"
                                onmouseover="this.style.backgroundColor='black'; this.style.color='white'"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='black'">Tulis
                                Ulasan</button>
                        </a>
                </div>
            </section>

            <section class="fitur">
                <div class="review-section">
                    <h2>Ulasan</h2>
                    <div class="review">
                        <?php
                        $sql = "SELECT * FROM review WHERE id_resto = 4 ORDER BY date DESC"; // jangan lupa ini juga diganti idnya --------------------------------
                        $q = mysqli_query($connect, $sql);
                        while ($r = mysqli_fetch_array($q)) {
                            $id = $r['id'];
                            $rating = $r['rating'];
                            $id_resto = $r['id_resto'];
                            $nama_resto = $r['nama_resto'];
                            $date = $r['date'];
                            $pesan = $r['pesan'];
                            $image = $r['image'];
                            $user_id = $r['user_id'];
                            $edited = $r['edited'];
                            // Untuk Mengambil nama dari user_id
                            $user_query = "SELECT name FROM user WHERE user_id = $user_id";
                            $user_result = mysqli_query($connect, $user_query);
                            $user_data = mysqli_fetch_array($user_result);
                            $nama = $user_data['name'];
                            ?>
                        <div class="review-grid">
                                <div style="display: flex; align-items: center;">
                                    <img src="img/user.png" alt="profile image" class="user-img">
                                    <div>
                                        <p><strong><?php echo $nama ?></strong></p>
                                        <p style="margin-bottom: 10px"><?php for ($i = 0; $i < $rating; $i++) {
                                            echo "⭐";
                                        } ?> | <?php echo $date ?></p>
                                    </div>
                                    <div id="pesan-edited">
                                        <div>
                                        <?php if($edit==true) { ?>
                                            Edited
                                            <img src="img/edit.png" alt="edit" style=" width: 15px; height: 15px;">
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <p style="opacity: 0.7;"><?php echo $pesan ?></p>
                                <div style="margin-top: 0px;">
                                    <?php if (!empty($image)) { ?>
                                        <img src="<?php echo $image ?>" alt="" class="review-img">
                                    <?php } ?>
                                </div>
                                <div style="margin-top: 10px;">
                                    <?php if ($user_session == $user_id) { ?>
                                        <a href="ulas.php?op=edit&id=<?php echo $id ?>">
                                            <button
                                                style="border-radius: 10px; border: 2px solid black; padding: 10px 20px; background-color: transparent; color: black; text-decoration: none; font-family: 'Trip Sans'; font-weight: bold; font-size: 16px"
                                                onmouseover="this.style.backgroundColor='black'; this.style.color='white'"
                                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='black'">Edit
                                                Ulasan</button>
                                        </a> <!-- jangan lupa ini bawahnya juga diganti -------------------------------- -->
                                        <a href="detail4.php?op=delete&id=<?php echo $id ?>" 
                                            onclick="return confirm('Yakin ingin menghapus ulasan?')">
                                        <button
                                            style="margin-left: 10px ;border-radius: 10px; border: 2px solid red; padding: 10px 20px; background-color: transparent; color: red; text-decoration: none; font-family: 'Trip Sans'; font-weight: bold; font-size: 16px"
                                            onmouseover="this.style.backgroundColor='red'; this.style.color='white'"
                                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='red'">Hapus
                                            Ulasan</button>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div> <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    </main>

</body>

</html>