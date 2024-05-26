<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($data);
$user_id = mysqli_query($connect, "SELECT user_id FROM user WHERE username = '$username' AND password = '$password'");

if ($cek > 0) {
    $row = mysqli_fetch_assoc($data);
    $userid = $row['user_id'];
    $_SESSION['user'] = $userid; 
    header("location:index.php");
    exit();
} else {
    header("location:login.php?pesan=gagal");
}
?>