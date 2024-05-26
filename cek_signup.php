<?php
include 'koneksi.php';
session_start();

$username = $_POST['s_username'];
$name = $_POST['s_name'];
$password = $_POST['s_password'];

// untuk cek apakah sudah ada di database
$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Username sudah ada. Mohon pilih username lain.');</script>";
    header("url=login.php");
} else {
    // Insert the data into the user table
    $query = "INSERT INTO user (username, name, password) VALUES ('$username', '$name', '$password')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("location: login.php?pesan=signup&user=$username");
        exit();
    } else {
        echo "<script>alert('Terjadi kesalahan saat memasukkan data: " . mysqli_error($connect) . "');</script>";
        header("location: login.php");
    }
}
?>