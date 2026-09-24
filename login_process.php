<?php
session_start();

// Aapka Fixed ID aur Password
$admin_user = "admin@gmail.com";
$admin_pass = "admin123";

if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($_POST['email'] === $admin_user && $_POST['password'] === $admin_pass) {
        // Agar sahi hai toh session set karo
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
    } else {
        // Agar galat hai toh wapas bhej do
        echo "<script>alert('Invalid Credentials!'); window.location='index.php';</script>";
    }
}
?>