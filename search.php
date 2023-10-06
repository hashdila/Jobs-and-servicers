<?php
include 'database_con.php';



$job_category = isset($_GET['job_category']) ? $_GET['job_category'] : null;
$location = isset($_GET['location']) ? $_GET['location'] : null;

if ($job_category && $location) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM tec_posts WHERE job_category = ? AND location = ?");

        $stmt->execute([$job_category, $location]);

        $results = $stmt->fetchAll();
        header('Content-Type: application/json');
        echo json_encode($results);
        exit;
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curved Corner Box with Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        .full-vh {
            height: 100vh;
            /* border: 2px solid #333; */
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px; /* spacing between items */
            /* background-image: url('application/search-bg.jpg'); */
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        

        .page_name h1 {
            margin: 0;
            color: #333;
            font-size: 2.5rem;
        }

        .search-container {
            width: 100%;
            max-width: 600px;

        }
        .search-container {
        border-radius: 5rem; /* or whatever value you like */
        }

        .bg-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1; 
        object-fit: cover;
        opacity: 0.7; /* adjust this value if you want to change the transparency */
        }
/* Add this to your existing styles */
@media only screen and (max-width: 768px) {
    .search-container {
        background-color: transparent; /* white with 50% opacity */
        /* Alternatively, use opacity if you want everything (including text and children elements) to be slightly transparent */
        /* opacity: 0.5; */
    }
}


    </style>

<script>
function updateDropdown1(value) {
    document.getElementById("dropdownMenuButton1").innerText = value;
}

function updateDropdown2(value) {
    document.getElementById("dropdownMenuButton2").innerText = value;
}


function searchData() {
    const job_category = document.getElementById("dropdownMenuButton1").innerText.trim();
    const location = document.getElementById("dropdownMenuButton2").innerText.trim();

    if (job_category === 'TECNITIONS') {
        alert('Please select a job category before searching.');
        return;
    }

    if (location === 'AREA') {
    alert('Please select a location before searching.');
    return;
    }


    // Update the window location to include the area
    window.location.href = `results.php?job_category=${job_category}&location=${location}`;

    fetch(`?job_category=${job_category}&location=${location}`)
        .then(response => response.json())
        .then(data => {
            const resultBox = document.getElementById("resultBox");
            resultBox.innerHTML = "";  // Clear previous results

            if(data.length === 0) {
                resultBox.innerHTML = "<p>No results found for the given criteria.</p>";
                return;
            }

            // ... the rest of your code remains unchanged


            data.forEach((item, index) => {
                
    resultBox.innerHTML += `
    <div class="col-md-2 mb-1 d-flex justify-content-center align-items-center"> 
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-black justify-content-center">${item.name}</div>
                <div class="card-body">
                    <p class="card-text">
                        <strong>Phone:</strong> ${item.phone_number}
                    </p>
                    <p class="card-text">
                        <strong>Address:</strong> ${item.address}
                    </p>
                    <p class="card-text">
                        <strong>Location:</strong> ${item.location}
                    </p>
                    <!-- More Details button triggering the modal -->
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-${index}">
                        More Details
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal structure for the current item -->
        <div class="modal fade" id="modal-${index}" tabindex="-1" aria-labelledby="modalLabel-${index}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-${index}">${item.name}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Phone:</strong> ${item.phone_number}</p>
                        <p><strong>Address:</strong> ${item.address}</p>
                        <p><strong>Location:</strong> ${item.location}</p>
                        <!-- Add any other details here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    `;
});
        })
        .catch(error => {
            console.error("There was an error fetching the data:", error);
        });


}
</script>

</head>

<body>

<div class="container-fluid position-relative full-vh">
<video autoplay loop muted playsinline class="bg-video">
        <source src="application/home.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <div class="page_name ">
        <h1 class="text-muted">Search</h1>
        <br>
    </div>

    <div class="search-container p-4 d-flex flex-column flex-md-row justify-content-between align-items-center bg-transparent shadow-lg">
       <!-- First Dropdown -->
    
        <div class="col-12 col-md">
            <div class="dropdown w-100%">
            <button class="btn bg-transparent text-dark btn-secondary dropdown-toggle border-0 w-100  fs-4 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">                    
                    
                TECNITIONS
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown1('Carpenter')">Carpenter</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown1('Mason')">Mason</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown1('Plumber')">Plumber </a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown1('Electrician')">Electrician </a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown1('Cleaner')">Cleaner </a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown1('Driver')">Driver </a></li>
                    


                </ul>
            </div>
        </div>

        <!-- Second Dropdown -->
        <div class="col-12 col-md mt-3 mt-md-0">
            <div class="dropdown w-100">
            <button class="btn bg-transparent text-dark btn-secondary dropdown-toggle border-0 w-100  fs-4 " type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">                    
               
                AREA  
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown2('Kandy')">Kandy</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown2('Peradeniya ')">Peradeniya</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown2('Theldeniya')">Theldeniya</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown2('Negambo')">Negambo</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown2('Colombo 1')">Colombo 1</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown2('Colombo 2')">Colombo 2</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateDropdown2('Colombo 3')">Colombo 3</a></li>
                </ul>
            </div>
        </div>

        <!-- Search Icon -->
        <div class="col-12 col-md mt-3 mt-md-0 d-flex justify-content-center">
            <button class="btn text-dark" onclick="searchData()">
                <i class="fas fa-search fa-2x"></i>
            </button>
        </div>

    </div>
    


    
</div>


<div class="result d-flex mt-3 justify-content-center align-items-center" id="resultBox" >

    <!-- Results will be displayed here -->
</div>
<script>

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>





