<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){ header("Location: index.php"); exit; }
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">DEV<span class="text-primary">MASTER</span></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">Services</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="register.php">New Enrollment</a></li>
                        <li><a class="dropdown-item" href="#">Web Development</a></li>
                        <li><a class="dropdown-item" href="#">SEO Optimization</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="admin.php">Admin Panel</a></li>
                <li class="nav-item ms-3">
                    <?php if(isset($_SESSION['admin_logged_in'])): ?>
                        <a href="process.php?logout=1" class="btn btn-danger btn-sm rounded-pill">Logout</a>
                    <?php else: ?>
                        <button class="btn btn-primary btn-sm rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary shadow mb-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Admin Dashboard</span>
        <a href="process.php?logout=1" class="btn btn-light">Logout</a>
    </div>
</nav>
<div class="container-fluid px-4">
    <div class="table-responsive bg-white p-3 rounded shadow">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Physical</th><th>Family</th><th>City</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM users");
                while($row = mysqli_fetch_assoc($res)){
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['full_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['height']}/{$row['weight']}</td>
                        <td>{$row['father_name']}</td>
                        <td>{$row['city']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger'>Del</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>