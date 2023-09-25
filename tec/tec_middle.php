<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Column Page with Different Widths using Bootstrap 5</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-3 ">

            <?php include 'tec_addbutton.php'; ?>

                <div class="container mt-4">
                    <!-- Search Bar -->
                    <div class="searchbar mb-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="search">Search:</label>
                                <input type="text" class="form-control" name="search" id="search" placeholder="Enter job category">
                            </div>
                            <input type="submit" class="btn btn-secondary btn-block" value="Search">
                        </form>
                    </div>

                    <!-- Job Categories -->
                    <div class="clickbox mb-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="search">Select Job Categories:</label>
                                <!-- Checkboxes for job categories -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Developer" id="Carpenter" name="need_t[]">
                                    <label class="form-check-label" for="Carpenter">Carpenter</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Electrician" id="Electrician" name="need_t[]">
                                    <label class="form-check-label" for="Electrician">Electrician</label>
                                </div>
                                <!-- Add more checkboxes as per your categories here... -->
                            </div>
                            <input type="submit" class="btn btn-secondary btn-block" value="Search">
                        </form>
                    </div>

                    <!-- Circle Radius Adjuster -->
                    <div class="mt-3">
                        <label for="radiusSlider">Adjust Circle Radius (in meters):</label>
                        <input type="range" id="radiusSlider" min="1000" max="20000" step="1000" value="10000"/>
                        <span id="radiusValue">10000</span>
                    </div>
                </div>
            </div>


            

            <!-- Right Column  -->
            <div class="col-md-9 ">
                    <div class="mapping  shadow mt-2 ">
                        <?php include '../cus/cus_map.php'; ?>
                    </div>
                    <br>
                    <br>
                    <div class=" mt-2  ">
                        <?php include 'tec_middle_dis.php'; ?>
                    </div>
            </div>
        </div>
    </div>
    

    <!-- Link to Bootstrap JS (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
