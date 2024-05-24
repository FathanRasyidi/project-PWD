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
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }

        .tentang {
            width: 45%;
        }

        .tentang-img {
            width: 35%;
            display: flex;
        }

        .tentang h1 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        .tentang p {
            font-size: 1.2em;
            line-height: 1.5em;
        }

        /* .tentang img {
            width: 50%;
        } */

        .manajemen {
            margin-top: 50px;
            text-align: center;
        }

        .manajemen h1 {
            font-size: 2em;
            margin-bottom: 20px;
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
                <h1>Tentang kita</h1>
                <p>DishCovery adalah sebuah website yang menyediakan informasi mengenai restoran-restoran yang ada di
                    Yogyakarta. Kami menyediakan informasi mengenai restoran terdekat, restoran terpopuler, dan juga
                    rekomendasi restoran yang bisa anda coba. Kami juga menyediakan informasi mengenai menu-menu yang
                    ada di
                    restoran tersebut, serta harga-harga yang ditawarkan. Kami berharap dengan adanya website ini, anda
                    bisa
                    menemukan restoran yang sesuai dengan keinginan anda.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At accusantium quibusdam assumenda ad
                    recusandae dolores, non quos consequatur velit, voluptate fugit ea inventore dolore. Sapiente cumque
                    earum voluptate ut aperiam consectetur, facere ea voluptatem similique. In, voluptas quibusdam id
                    distinctio, magni odio autem totam esse, voluptatum quae eveniet dolor quas!
                </p>
            </div>
            <div class="tentang-img">
                <img src="img/logo.png" alt="logo">
            </div>
        </section>

        <section class="manajemen">
            <h1>Manajemen</h1>
            <div class="manajemen-list">
                <div class="manajemen-item">
                    <img src="img/user.png" alt="COO">
                    <h3>Fathan Rasyidi</h3>
                    <p>Founder</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptatum possimus cumque!
                        Saepe provident nobis quis aliquam eligendi est sequi vero accusamus assumenda, laudantium
                        facere.</p>
                </div>
                <div class="manajemen-item">
                    <img src="img/user.png" alt="CFO">
                    <h3>Aditya Rahman</h3>
                    <p>Co-Founder</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi voluptas expedita incidunt amet,
                        soluta beatae. Necessitatibus quia adipisci hic ea autem, fugit corrupti consectetur incidunt.
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>