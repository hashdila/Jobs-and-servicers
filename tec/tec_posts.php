<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: tec_login.php");
    exit;
}

// ...  database connection code here ...

$host = "localhost";
$db   = "jas";
$user = "root";
$pass = "";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $job_category = $_POST["job_category"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $work_description = $_POST["work_description"];
    $location = $_POST["location"];
    $phone_number = $_POST["phone_number"];
    $tec_id = $_SESSION["id"];

    $image1 = $_FILES["image1"]["name"];
    $image2 = $_FILES["image2"]["name"];
    $image3 = $_FILES["image3"]["name"];

    $target_dir = "images/";

    // Save the uploaded image files to your server's file system and store their paths in the database
    move_uploaded_file($_FILES["image1"]["tmp_name"], $target_dir . $image1);
    move_uploaded_file($_FILES["image2"]["tmp_name"], $target_dir . $image2);
    move_uploaded_file($_FILES["image3"]["tmp_name"], $target_dir . $image3);

    $sql = "INSERT INTO tec_posts (name, job_category, age, address, work_description, image1, image2, image3, location, phone_number, tec_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $job_category, $age, $address, $work_description, $target_dir . $image1, $target_dir . $image2, $target_dir . $image3, $location, $phone_number, $tec_id]);

    header("Location: tec_home.php");
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Job Post Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>



<body>


<?php include 'tec_dashbord.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3>Post a Job</h3>
            <form action="tec_posts.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="job_category" class="form-label text-white fs-3">Job Category</label>
                    <select name="job_category" class="form-control form-control-lg">
                        <option value="Select">Select</option>
                        <option value="Carpenter">Carpenter</option>
                        <option value="Mason">Mason</option>
                        <option value="Fire Technician">Fire Technician</option>
                        <option value="Electrical Technician">Electrical Technician</option>
                        <option value="Drivers">Drivers</option>
                        <option value="Plumber">Plumber</option>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="work_description">Work Description</label>
                    <textarea name="work_description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="image1">Image 1</label>
                    <input type="file" name="image1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image2">Image 2</label>
                    <input type="file" name="image2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image3">Image 3</label>
                    <input type="file" name="image3" class="form-control">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Post Job</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
