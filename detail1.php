<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eastern Kopi TM Seturan</title>
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
        }

        .review-img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 15px;
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
            <a href="login.php" class="login" style="background-color: #99BC85;">Login</a>
        </nav>
    </header>

    <section class="banner">
        <img src="img/tm1.jpg" alt="Banner Image" style="filter: brightness(100%)">
    </section>

    <main>
        <div class="container">
            <div class="restaurant-info">
                <h1>Eastern Kopi TM Seturan</h1>
                <p style="opacity: 0.8; margin-top: 0px; margin-bottom: 0px;">Jl. Seturan Raya No.A9-10, Kledokan,
                    Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281.</p>
                <p style="font-weight: bold; margin-top: 0px;">(0274) 484441</p>
                <div class="tags">
                    <span>Coffee</span>
                    <span>Tea</span>
                    <span>Smoothies</span>
                    <span>Snacks</span>
                </div>
                <p style="margin-bottom: 0px; opacity: 0.8">Buka : 09.00-22.00</p>
                <p style="margin-top: 0px; opacity: 0.8">Rp. 25.000 - Rp. 95.000</p>
                <a href="https://maps.app.goo.gl/bytvck8gzQkNozw78" target="_blank">
                    <button
                        style="border-radius: 10px; border: 2px solid green; padding: 10px 20px; background-color: transparent; color: green; text-decoration: none; font-family: 'Trip Sans'; font-weight: bold; font-size: 16px"
                        onmouseover="this.style.backgroundColor='green'; this.style.color='white'"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='green'">Maps</button>
                </a>
            </div>

            <section class="fitur">
                <h2 style="margin-top: 0px;">Layanan</h2>
                <div class="info">
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Pesan
                            Antar</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Makanan
                            halal</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Kopi</span>
                    </div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Tempat
                            duduk di area terbuka</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Makan di
                            tempat</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Pilihan
                            menu vegetarian</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px"
                                style="margin-right: 10px">Toilet</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px"
                                style="margin-right: 10px">Wi-Fi</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Menerima
                            reservasi</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Kartu
                            debit</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Kartu
                            kredit</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Menu untuk
                            anak-anak</span></div>
                    <div class="item"><span><img src="img/check.png" width="20px" style="margin-right: 10px">Banyak
                            tempat parkir</span></div>
                </div>
            </section>

            <section class="fitur">
                <div class="contribute">
                    <h2 style="margin-top: 0px;">Contribute</h2>
                    <a href="ulas.php">
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
                        <div class="review-grid">
                            <div style="display: flex; align-items: center;">
                                <img src="img/user.png" alt="profile image" class="user-img">
                                <div>
                                    <p><strong>Aditya Rahman</strong></p>
                                    <p style="margin-bottom: 10px">⭐⭐⭐⭐⭐ | 24 Juni 2024</p>
                                    <!-- bintang dan tanggal berdasar rating pada database -->
                                </div>
                            </div>
                            <p style="opacity: 0.7;">Menurut saya restoran ini mendapatkan codeblu star. Mulai dari penyajiannya, pelayanannya, dan lain sebagainya. Makanan yang dihidangkan pun terbilang cukup lengkap dengan harga yang terjangkau. Sangat direkomendasikan bagi yang ingin mencobanya.</p>
                            <!-- review berdasar review pada database -->
                            <div style="margin-top: 20px;">
                                <img src="img/food1.jpg" alt="food image" class="review-img">
                                <!-- jika ada foto -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

</body>

</html>