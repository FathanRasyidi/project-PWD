<?php
include 'koneksi.php';
session_start();
$user_session = empty($_SESSION['user']) ? '' : $_SESSION['user'];

//untuk menampilkan data restoran
if (isset($_GET["resto"])) {
    $resto_id = $_GET["resto"];

    if (isset($_COOKIE['user']) && !isset($_SESSION['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
        header("location:detail$resto_id.php");
        exit();
    }

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
            header("refresh:0;location:detail$.php?resto=$resto_id");
        } else {
            $error = "Gagal menghapus data";
        }

    }

    if ($op == 'ulasan_sukses') {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
        header("refresh: 0;url=detail.php?resto=$resto_id");
    } else if ($op == 'ulasan_edit') {
        echo "<script>alert('Data berhasil diubah');</script>";
        header("refresh: 0;url=detail.php?resto=$resto_id");
    }

    // untuk rata rata rating
    $sql = "SELECT rating FROM review WHERE id_resto = '$resto_id'";
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
} else {
    $resto_id = "";
}

$sqlR = "SELECT * FROM restoran where id_resto = '$resto_id'";
$qR = mysqli_query($connect, $sqlR);
$db = mysqli_fetch_array($qR);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $db['nama_resto'] ?></title>
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
        <img src="img/banner<?php echo $resto_id ?>.jpg" alt="Banner Image" style="filter: brightness(100%)">
    </section>

    <main>
        <div class="container">
            <div class="restaurant-info">
                <h1><?php echo $db['nama_resto'] ?></h1>
                <p
                    style="float: right; margin-top: -40px; background-color: green; border-radius: 10px; display: inline-block; padding: 7px 7px; color: white;">
                    ⭐ <?php echo $average_rating ?></p>
                <p style="opacity: 0.8; margin-top: 0px; margin-bottom: 0px;"><?php echo $db['alamat'] ?></p>
                <p style="font-weight: bold; margin-top: 0px;"><?php echo $db['telp'] ?></p>
                <div class="tags">
                    <?php
                    $sqlK = "SELECT kategori FROM restoran WHERE id_resto = '$resto_id'";
                    $qK = mysqli_query($connect, $sqlK);
                    while ($k = mysqli_fetch_array($qK)) {
                        $kategori = explode(',', $k['kategori']);
                        foreach ($kategori as $kate) { ?>
                            <span><?php echo $kate; ?></span>
                        <?php }
                    } ?>
                </div>
                <p style="margin-bottom: 0px; opacity: 0.8">Buka : <?php echo $db['jam'] ?></p>
                <p style="margin-top: 0px; opacity: 0.8"><?php echo $db['harga'] ?></p>
                <a href="<?php echo $db['map'] ?>" target="_blank">
                    <button
                        style="border-radius: 10px; border: 2px solid green; padding: 10px 20px; background-color: transparent; color: green; text-decoration: none; font-family: 'Trip Sans'; font-weight: bold; font-size: 16px"
                        onmouseover="this.style.backgroundColor='green'; this.style.color='white'"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='green'">Maps</button>
                </a>
            </div>

            <section class="fitur">
                <h2 style="margin-top: 0px;">Layanan</h2>
                <div class="info">
                    <?php
                    $sqlL = "SELECT layanan FROM restoran WHERE id_resto = '$resto_id'";
                    $qL = mysqli_query($connect, $sqlL);
                    while ($l = mysqli_fetch_array($qL)) {
                        $layanan = explode(',', $l['layanan']);
                        foreach ($layanan as $laya) { ?>
                            <div class="item">
                                <span><img src="img/check.png" width="20px"
                                        style="margin-right: 10px"><?php echo $laya ?></span>
                            </div>
                        <?php }
                    } ?>
                </div>
            </section>

            <section class="fitur">
                <div class="contribute">
                    <h2 style="margin-top: 0px;">Contribute</h2>
                    <?php if (empty($_SESSION['user'])) { ?>
                        <a href="login.php?pesan=belum_login"> <!--- pesan=logindulu --->
                        <?php } else { ?>
                        <a href="ulas.php?resto=<?php echo $resto_id ?>"> <!-- op=resto&id= --->
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
                        $sql = "select * from review where id_resto='$resto_id' order by date desc";
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
                            $edit = $r['edited'];
                            // Untuk Mengambil nama dari user_id
                            $user_query = "SELECT name FROM user WHERE user_id = $user_id";
                            $user_result = mysqli_query($connect, $user_query);
                            $user_data = mysqli_fetch_array($user_result);
                            $nama = $user_data['name'];
                            ?>
                        <div class="review-grid"> <!-- diulang sebanyak jumlah review -->
                                <div style="display: flex; align-items: center;">
                                    <img src="img/user.png" alt="profile image" class="user-img">
                                    <div>
                                        <p><strong><?php echo $nama ?></strong></p>
                                        <p style="margin-bottom: 10px"><?php for ($i = 0; $i < $rating; $i++) {
                                            echo "⭐";
                                        } ?> | <?php echo $date ?></p>
                                    </div>
                                    <div id="pesan-edited" style="opacity: 0.4">
                                        <div>
                                            <?php if ($edit == true) { ?>
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
                                        </a>
                                        <a href="detail.php?resto=<?php echo $resto_id ?>&op=delete&id=<?php echo $id ?>"
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