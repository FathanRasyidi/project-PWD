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
            /* Add this line to center the container */
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
        <form action="submit_review.php" method="post" enctype="multipart/form-data">
            <label for="restaurant_name">Nama Restoran</label>
            <input type="text" id="restaurant_name" name="restaurant_name" readonly>

            <label for="rating">Bagaimana penilaian Anda tentang pengalaman Anda?</label>
            <div class="rating">
                <select id="rating" name="rating" required>
                    <option value="1">⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="5" selected>⭐⭐⭐⭐⭐</option>
                </select>
            </div>

            <label for="review">Tulis ulasan</label>
            <textarea id="review" name="review" required></textarea>

            <label for="foto">Tambahkan beberapa foto</label>
            <p class="optional">Opsional</p>
            <input type="file" id="foto" name="foto" multiple>

            <button type="submit" class="submit-btn"
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