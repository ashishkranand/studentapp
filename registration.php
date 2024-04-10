<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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

    .btn-signup {
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
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form id="registrationForm" method="post" action="./register.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-signup" name="signup">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#registrationForm').validate({
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: '#password'
                }
            },
            messages: {
                name: 'Please enter your name',
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a valid email address'
                },
                phone: {
                    required: 'Please enter your phone number',
                    minlength: 'Please enter a valid phone number',
                    maxlength: 'Please enter a valid phone number',
                    digits: 'Please enter a valid phone number'
                },
                password: {
                    required: 'Please enter a password',
                    minlength: 'Your password must be at least 6 characters long'
                },
                confirm_password: {
                    required: 'Please confirm your password',
                    minlength: 'Your password must be at least 6 characters long',
                    equalTo: 'Please enter the same password as above'
                }
            }
        });
    });
    </script>

</body>

</html>
