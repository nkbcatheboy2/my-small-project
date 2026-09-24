<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>DevMaster | Software Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

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

<div class="hero-section">
    <div class="container">
        <h1 class="display-3 fw-bold">Building Digital Excellence</h1>
        <p class="fs-4">20+ Projects Completed Successfully | 5+ Years Industry Experience</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-4"><div class="feature-box"><h3>Quality</h3><p>Hum behtareen quality ki websites banate hain.</p></div></div>
        <div class="col-md-4"><div class="feature-box"><h3>Speed</h3><p>Fast loading aur responsive designs hamari pehchan hai.</p></div></div>
        <div class="col-md-4"><div class="feature-box"><h3>Support</h3><p>24/7 technical support aur consultation.</p></div></div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4 border-0 rounded-4 shadow">
            <h4 class="fw-bold mb-3">Admin Login</h4>
            <form action="process.php" method="POST">
                <input type="email" name="admin_email" class="form-control mb-3" placeholder="Email" required>
                <input type="password" name="admin_pass" class="form-control mb-3" placeholder="Password" required>
                <button type="submit" name="admin_login" class="btn btn-primary w-100">Access Dashboard</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>