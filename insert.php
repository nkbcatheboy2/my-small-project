<?php
include 'db.php';

if(isset($_POST['submit'])){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    $sql = "INSERT INTO users (full_name, email, phone, age) VALUES ('$name', '$email', '$phone', '$age')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Data Saved!'); window.location='admin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>