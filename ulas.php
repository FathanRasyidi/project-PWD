<?php
include 'koneksi.php';
session_start();
$op = "";

$id_resto = "";
$date = "";
$nama_resto = "";
$rating = "";
$pesan = "";
$image = "";
$user_id = "";
$edit = "";

if (isset($_GET['resto'])) {
    $id_resto = $_GET['resto'];
} else {
    $id_resto = "";
}

//untuk mengambil nama restoran
$sqlR = "SELECT nama_resto FROM restoran where id_resto = '$id_resto'";
$qR = mysqli_query($connect, $sqlR);
$db = mysqli_fetch_array($qR);
$nama_resto = $db['nama_resto'] ?? '';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM review WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($query);

    if (!$data) {
        $error = "Data tidak ditemukan";
    } else {
        $rating = $data['rating'];
        $id_resto = $data['id_resto'];
        $nama_resto = $data['nama_resto'];
        $date = $data['date'];
        $pesan = $data['pesan'];
        $image = $data['image'];
        $user_id = $data['user_id'];
    }
}

if (isset($_POST['submit'])) {
    $id_resto = $_POST['id_resto'];
    $nama_resto = $_POST['nama_resto'];
    $rating = $_POST['rating'];
    $date = date("d-m-Y");
    $pesan = $_POST['review'];
    $user_id = $_SESSION['user'];
    $image = $_FILES["foto"]["name"];
    $edit = "";

    // untuk upload foto
    if (isset($_FILES["foto"])) {
        $file_name = $_FILES["foto"]["name"];
        $file_tmp = $_FILES["foto"]["tmp_name"];
        $file_type = $_FILES["foto"]["type"];
        $file_size = $_FILES["foto"]["size"];
        $file_error = $_FILES["foto"]["error"];

        if ($file_error === 0) {
            $file_destination = "uploads/" . $id_resto . "-" . rand(1, 1000) . "_" . $date . "_" . $user_id . "_" . $file_name;
            if (!is_dir("uploads")) {
                mkdir("uploads");
            }
            move_uploaded_file($file_tmp, $file_destination);
            $image = $file_destination;
        } else {
            $error = "Gagal mengunggah file";
        }
    }

    //untuk insert data ke database
    if ($id_resto && $rating && $pesan && $user_id && $date && $nama_resto) {
        if ($op == 'edit') {
            //jika tidak mengupload gambar maka hapus gambar lama
            if ($image == "") {
                $sqlG = "SELECT image FROM review WHERE id = '$id'";
                $qG = mysqli_query($connect, $sqlG);
                $row = mysqli_fetch_assoc($qG);
                $imagePath = isset($row['image']) ? $row['image'] : '';
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $edit = true;
            $sql = "UPDATE review SET rating='$rating', date='$date', id_resto='$id_resto', nama_resto='$nama_resto', pesan='$pesan', image='$image', user_id='$user_id', edited ='$edit'  WHERE id = $id";
            $query = mysqli_query($connect, $sql);
            if ($query) {
                header("location:detail.php?resto=$id_resto&op=ulasan_edit");
            } else {
                echo "<script>alert('Data gagal diubah');</script>";
            }
        } else {
            $sql = "INSERT INTO review (rating, date, id_resto, nama_resto, pesan, image, user_id) VALUES ('$rating', '$date', '$id_resto', '$nama_resto', '$pesan', '$image', '$user_id')";
            $query = mysqli_query($connect, $sql);
            if ($query) {
                header("location:detail.php?resto=$id_resto&op=ulasan_sukses");
            } else {
                echo "<script>alert('Data gagal ditambahkan');</script>";
            }
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="font/stylesheet.css"> <!-- Untuk font -->
    <link rel="stylesheet" href="index.css"> <!-- Untuk styling -->
    <style>
        .judul {
            text-align: left;
            margin-top: 0px;
            margin-left: 40px;
            width: 35%;
        }

        .judul h1 {
            font-size: 40px;
            font-weight: bold;
        }

        .kontainer1 {
            display: flex;
            justify-content: space-between;
            margin-left: 300px;
            margin-right: 300px;
        }

        .logo {
            display: flex;
            align-content: right;
            margin-right: 50px;
            align-items: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            padding-top: 0px;
            font-weight: bold;
            font-size: 18px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 97%;
            padding: 10px 0px;
            padding-left: 10px;
            padding-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            width: 100%;
            padding: 10px 0px;
            padding-left: 10px;
            padding-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        .rating {
            display: flex;
            align-items: center;
        }

        .optional {
            font-size: 12px;
            color: #888;
            margin-bottom: 10px;
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <header>
        <div class="brand">
            <img src="img/logo.png" alt="logo" width="40px">DishCovery
        </div>
        <nav>
            <a href="index.php" style="font-weight: bold; margin-right: 20px">Home</a>
        </nav>
    </header>

    <div class="kontainer1">
        <section class="judul">
            <h1>Beri Tahu Kami Tentang Kunjungan Anda</h1>

            <hr>
        </section>
        <div class="logo">
            <img src="img/logo.png" alt="" width="100px" height="100">
        </div>
    </div>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_resto" value="<?php echo $id_resto ?>">

            <label for="nama_resto">Nama Restoran</label>
            <input type="text" id="nama_resto" name="nama_resto" value="<?php echo $nama_resto ?>" readonly>

            <label for="rating">Bagaimana penilaian Anda tentang pengalaman Anda?</label>
            <div class="rating">
                <select id="rating" name="rating" required>
                    <option value="1" <?php if ($rating == "1")
                        echo "selected"; ?>>⭐</option>
                    <option value="2" <?php if ($rating == "2")
                        echo "selected"; ?>>⭐⭐</option>
                    <option value="3" <?php if ($rating == "3")
                        echo "selected"; ?>>⭐⭐⭐</option>
                    <option value="4" <?php if ($rating == "4")
                        echo "selected"; ?>>⭐⭐⭐⭐</option>
                    <option value="5" <?php if ($rating == "5")
                        echo "selected"; ?>>⭐⭐⭐⭐⭐</option>
                </select>
            </div>

            <label for="review">Tulis ulasan</label>
            <textarea id="review" name="review" required><?php echo $pesan ?></textarea>

            <label for="foto">Tambahkan foto</label>
            <p class="optional">Opsional</p>
            <input type="file" id="foto" name="foto">

            <button type="submit" class="submit-btn" name="submit"
                style="margin-top: 10px; border-radius: 10px; border: 2px solid black; padding: 8px 20px; background-color: transparent; color: black; text-decoration: none; font-family: 'Trip Sans'; font-weight: bold; font-size: 16px"
                onmouseover="this.style.backgroundColor='black'; this.style.color='white'"
                onmouseout="this.style.backgroundColor='transparent'; this.style.color='black'">Post</button>
        </form>
    </div>

</body>

<footer
    style="align-content: center; background-color: rgba(0, 0, 0, 0.3); text-align: center; color:white; height: 60px;">
    © 2024 SI-C. All rights reserved.
</footer>

</html>