<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Column Page with Different Widths using Bootstrap 5</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .background {
        background-image: url('../application/cushome1.jpg'); 
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center; 
    }
    </style>
</head>
<body>
    <div class="background">
            <div class="container">
                <div class="row">
                    <!-- Left Column (60%) -->
                    <div class="col-md-3 ">

                    <?php include 'cus_addbutton.php'; ?>

                    <?php include 'cus_midsearch.php'; ?>
                    
                        
                    </div>
                    <!-- Right Column (40%) -->
                    <div class="col-md-9 ">
                            <div class="mapping  shadow mt-2 ">
                                <?php include '../tec/tec_map.php'; ?>
                            </div>
                            <br>
                            <br>
                            <div class=" mt-2  ">
                                <?php include 'cus_middledis.php'; ?>
                            </div>
                    </div>
                </div>
            </div>
            </div>
    <!-- Link to Bootstrap JS (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
