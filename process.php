<?php
// Session ko long-time tak active rakhne ke liye settings
ini_set('session.gc_maxlifetime', 86400); // 24 Ghante
session_set_cookie_params(86400);
session_start();
include 'db.php';

// 1. LOGIN
if(isset($_POST['admin_login'])){
    $email = $_POST['admin_email'];
    $pass = $_POST['admin_pass'];
    
    if($email == "admin@gmail.com" && $pass == "admin123"){
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['login_time'] = time();
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('Invalid Access'); window.location='index.php';</script>";
    }
}

// 2. REGISTRATION (Handle 20 Fields)
if(isset($_POST['register_user'])){
    $name = $_POST['full_name']; $email = $_POST['email']; $phone = $_POST['phone'];
    $height = $_POST['height']; $weight = $_POST['weight']; $blood = $_POST['blood_group'];
    $father = $_POST['father_name']; $mother = $_POST['mother_name']; $addr = $_POST['address'];
    $uid = $_POST['user_id']; $upass = $_POST['user_password'];

    $sql = "INSERT INTO users (full_name, email, phone, height, weight, blood_group, father_name, mother_name, address, user_id, user_password) 
            VALUES ('$name','$email','$phone','$height','$weight','$blood','$father','$mother','$addr','$uid','$upass')";
    
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Registered Successfully!'); window.location='index.php';</script>";
    }
}

// 3. LOGOUT
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
    exit();
}
?>