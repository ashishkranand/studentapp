<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <style>
    body {
        background-color: #f8f9fa;
        /* Light grey background */
    }

    .card {
        margin-top: 100px;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    .btn-login {
        width: 100%;
        padding: 12px;
        font-size: 18px;
        border-radius: 5px;
    }

    .error {
        color: red;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form id="loginForm" method="post" action="login.php">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-login" name="login">Login</button> <br>
                            <br>
                            <a href="./registration.php" class="btn btn-primary btn-login">Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#loginForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a valid email address'
                },
                password: {
                    required: 'Please enter your password'
                }
            }
        });
    });
    </script>

</body>

</html>
<?php
include 'dbconnect.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from students where email = '" . $email . "' and password='" . $password . "'";
    $result = mysqli_query($conn, $sql);
    $rownum = mysqli_num_rows($result);
    if ($rownum > 0) {
        session_start();
        $_SESSION['username'] = $email;
        header('location:dashboard.php');
        exit;
    } else {
        header('location:login.php');
        exit;
    }

}
?>