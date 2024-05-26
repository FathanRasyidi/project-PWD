<?php
include 'koneksi.php';
session_start();
$usn = "";

if (isset($_GET['pesan'])){
    $op = $_GET['pesan'];
    if ($op == 'logout') {
        echo "<script>alert('Anda telah berhasil logout');</script>";
        header("refresh:0;url=login.php");
    } elseif ($op == 'gagal') {
        echo "<script>alert('Login gagal! email dan password salah!');</script>";
        header("refresh:0;url=login.php");
    } elseif ($op == 'belum_login') {
        echo "<script>alert('Anda harus login terlebih dahulu');</script>";
        header("refresh:0;url=login.php");
    }elseif ($op == 'signup') {
        if (isset($_GET['user'])){
            $usn = $_GET['user'];
        }
        echo "<script>alert('Sign-Up berhasil. Silahkan Sign-In.');</script>";
        header("url=login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="font/stylesheet.css">
    <title>Sign In/Sign Up</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="brand">
                <img src="img/logo.png" alt="logo" width="40px">DishCovery
            </div>
            <nav>
                DishCovery<img src="img/logo.png" alt="logo" width="40px">
            </nav>
        </header>
        <div class="signin-signup">
            <form action="cek_login.php" class="sign-in-form" method="POST">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Username" name="username" value="<?php echo $usn ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <input type="submit" value="Login" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>
            <form action="cek_signup.php" class="sign-up-form" method="POST">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Username" name="s_username">
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Name" name="s_name">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="s_password">
                </div>
                <input type="submit" value="Sign up" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Member of Brand?</h3>
                    <p>Sign-In untuk mengakses fitur terbaik DishCovery.</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="img/sign_in.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Brand?</h3>
                    <p>Sign-Up untuk mulai membuat akun DishCovery.</p>
                    <button class="btn" id="sign-up-btn" name="signup">Sign up</button>
                </div>
                <img src="img/sign_up.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>