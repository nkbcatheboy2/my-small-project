<!DOCTYPE html>
<html>
<head>
    <title>Registration | Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card reg-card p-5">
        <h2 class="text-center mb-4">New Enrollment Form</h2>
        <form action="process.php" method="POST" class="row g-3">
            <div class="col-md-4"><label>Full Name</label><input type="text" name="full_name" class="form-control" required></div>
            <div class="col-md-4"><label>Email</label><input type="email" name="email" class="form-control" required></div>
            <div class="col-md-4"><label>Phone</label><input type="text" name="phone" class="form-control" required></div>
            
            <div class="col-md-4"><label>Height (cm)</label><input type="text" name="height" class="form-control"></div>
            <div class="col-md-4"><label>Weight (kg)</label><input type="text" name="weight" class="form-control"></div>
            <div class="col-md-4"><label>Blood Group</label><input type="text" name="blood_group" class="form-control"></div>

            <div class="col-md-6"><label>Father's Name</label><input type="text" name="father_name" class="form-control"></div>
            <div class="col-md-6"><label>Mother's Name</label><input type="text" name="mother_name" class="form-control"></div>
            
            <div class="col-12"><label>Address</label><textarea name="address" class="form-control"></textarea></div>
            
            <div class="col-md-6"><label>User ID</label><input type="text" name="user_id" class="form-control" required></div>
            <div class="col-md-6"><label>Password</label><input type="password" name="user_password" class="form-control" required></div>
            
            <div class="col-12 text-center mt-4">
                <button type="submit" name="register_user" class="btn btn-primary btn-lg px-5">Submit Record</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>