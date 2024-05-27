<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="font/stylesheet.css"> <!-- Untuk font -->
    <link rel="stylesheet" href="index.css"> <!-- Untuk styling -->
    <style>
        .about {
            margin: 80px;
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
            margin-left: 150px;
            margin-right: 150px;
        }

        .tentang {
            width: 45%;
        }

        .tentang-img {
            align-content: center;
            margin-right: 50px;
        }

        .tentang h1 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: left;
        }

        .tentang p {
            font-size: 1.2em;
            line-height: 1.5em;
        }

        .tentang img {
            width: 10%;
        }

        .manajemen {
            margin-top: 50px;
            text-align: center;

        }

        .manajemen h1 {
            font-size: 2em;
            margin-bottom: 50px;
        }

        .manajemen-list {
            display: flex;
            justify-content: space-around;
        }

        .manajemen-item {
            width: 30%;
        }

        .manajemen-item img {
            width: 50%;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            align-content: center;
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

    <main>
        <section class="about">
            <div class="tentang">
                <h1 style="border-bottom: 2px solid red; width: 40%;">Tentang kita</h1>
                <p>DishCovery adalah sebuah website yang menyediakan informasi mengenai restoran-restoran yang ada di
                    Yogyakarta. Kami menyediakan informasi mengenai restoran terdekat, restoran terpopuler, dan juga
                    rekomendasi restoran yang bisa anda coba. Kami juga menyediakan informasi mengenai menu-menu yang
                    ada di
                    restoran tersebut, serta harga-harga yang ditawarkan. Kami berharap dengan adanya website ini, anda
                    bisa
                    menemukan restoran yang sesuai dengan keinginan anda.</p>
            </div>
            <div class="tentang-img">
                <img src="img/logo.png" alt="logo" width="300px">
            </div>
        </section>

        <section class="manajemen">
            <h1>Manajemen</h1>
            <div class="manajemen-list">
                <div class="manajemen-item">
                    <img src="img/user.png" alt="COO">
                    <h3>Fathan Rasyidi</h3>
                    <p style="opacity: 0.6">Founder</p>
                    <p>Hanya orang biasa yang kepoan. Terus berusaha walaupun pemula. Sebelahku paling hobi spam Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Itaque a earum eum accusantium nam fuga amet
                        nostrum, architecto officia cupiditate at, ducimus porro libero minima praesentium dolorem
                        neque, quam eveniet.</p>
                </div>
                <div class="manajemen-item">
                    <img src="img/user.png" alt="CFO">
                    <h3>Aditya Rahman</h3>
                    <p>Co-Founder</p>
                    <p>Bukan siapa-siapa, tidak ada spesial-spesialnya karena kalau spesial karetnya dua. Semoga aku
                        bisa jadi anak yang sholeh dan berbakti kepada mama papa.
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>