<?php
include '../database_con.php';

// Initialize category to search variable
$category_to_search = "";

// Get unique job categories for the dropdown
$stmtCategories = $pdo->prepare("SELECT DISTINCT job_category FROM tec_posts");
$stmtCategories->execute();
$categories = $stmtCategories->fetchAll(PDO::FETCH_COLUMN, 0);

// Process the search request if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['category'])) {
    $category_to_search = $_GET['category'];

    $sql = "SELECT * FROM tec_posts WHERE job_category = :category ORDER BY job_category ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['category' => $category_to_search]);
    $jobs = $stmt->fetchAll();

    if (empty($jobs)) {
        $message = "No jobs found in the database for category " . $category_to_search . ".";
    }
} else {
    $sql = "SELECT * FROM tec_posts ORDER BY job_category ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $jobs = $stmt->fetchAll();

    if (empty($jobs)) {
        $message = "No jobs found in the database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata and other head elements... -->

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.5.0/css/bootstrap.min.css">
</head>

<body>

<!-- 2. HTML Form: -->
<div class="container mt-4">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET" class="mb-4">
        <div class="input-group">
            <label for="category" class="visually-hidden">Job Category</label>
            <select id="category" class="form-select" name="category">
                <option selected>Choose job category...</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category); ?>" <?php echo ($category_to_search == $category) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <!-- Display results (add your previous HTML to display the jobs here) -->
</div>

<!-- Optional: Bootstrap 5 JS (for dropdowns and other JS features) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
