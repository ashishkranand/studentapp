<?php
session_start();
$email = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        /* Light grey background */
        color: #333;
        /* Default text color */
    }

    .navbar {
        background-color: #007bff;
        /* Blue navbar */
    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: #fff;
        /* White text */
    }

    .footer {
        background-color: #007bff;
        /* Blue footer */
        color: #fff;
        /* White text */
        text-align: center;
        padding: 20px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .profile-container {
        max-width: 800px;
        margin: 50px auto;
    }

    .profile-info {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .profile-image-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h2 {
        color: #007bff;
        /* Blue heading */
    }

    .info-box {
        background-color: #f8d7da;
        /* Red background */
        color: #721c24;
        /* Dark red text */
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .info-box.success {
        background-color: #d4edda;
        /* Green background */
        color: #155724;
        /* Dark green text */
    }

    .info-box img {
        max-width: 100px;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Profile content -->
    <div class="container profile-container">
        <div class="row">
            <div class="col-md-8">
                <div class="profile-info">
                    <h2>Profile Information</h2>
                    <!-- Registration Info -->
                    <div class="info-box">
                        <h4>Registration Details</h4>
                        <?php
include 'dbconnect.php';
$sql = "select * from students where email='" . $email . "'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

                        <p><strong>Name:</strong> <?php echo $row['name'] ?></p>
                        <p><strong>Email:</strong> <?php echo $row['email'] ?></p>
                        <p><strong>Phone:</strong> <?php echo $row['phone'] ?></p>
                    </div>
                    <div class="info-box success">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-image-card">
                    <h2>Profile Image</h2>
                    <img src="./images/<?php echo $row['imgpath'] ?>" alt="Profile Image" class="img-fluid">
                    <?php
}
}
?>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <span>© 2024 Dashboard. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>