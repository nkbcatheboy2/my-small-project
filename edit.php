<?php
session_start();
include 'db.php';

// Check if ID is provided
if(!isset($_GET['id'])) { header("Location: admin.php"); exit; }

$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    // Sanitize and collect all inputs
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $blood = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $father = mysqli_real_escape_string($conn, $_POST['father_name']);
    $mother = mysqli_real_escape_string($conn, $_POST['mother_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);

    // Update Query
    $sql = "UPDATE users SET 
            full_name='$name', 
            email='$email', 
            phone='$phone', 
            height='$height', 
            weight='$weight', 
            blood_group='$blood', 
            father_name='$father', 
            mother_name='$mother', 
            address='$address',
            city='$city'
            WHERE id=$id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Record Updated Successfully!'); window.location='admin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header bg-warning text-dark fw-bold">Edit Details for: <?php echo $data['full_name']; ?></div>
            <div class="card-body p-4">
                <form method="POST" class="row g-3">
                    <div class="col-md-4">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="<?php echo $data['full_name']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $data['phone']; ?>">
                    </div>
                    
                    <!-- Physical Section -->
                    <div class="col-md-3">
                        <label>Height (cm)</label>
                        <input type="text" name="height" class="form-control" value="<?php echo $data['height']; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Weight (kg)</label>
                        <input type="text" name="weight" class="form-control" value="<?php echo $data['weight']; ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Blood Group</label>
                        <input type="text" name="blood_group" class="form-control" value="<?php echo $data['blood_group']; ?>">
                    </div>

                    <!-- Family Section -->
                    <div class="col-md-6">
                        <label>Father's Name</label>
                        <input type="text" name="father_name" class="form-control" value="<?php echo $data['father_name']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label>Mother's Name</label>
                        <input type="text" name="mother_name" class="form-control" value="<?php echo $data['mother_name']; ?>">
                    </div>

                    <div class="col-12">
                        <label>Address</label>
                        <textarea name="address" class="form-control"><?php echo $data['address']; ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="<?php echo $data['city']; ?>">
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" name="update" class="btn btn-primary px-5">Update Record</button>
                        <a href="admin.php" class="btn btn-secondary">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>