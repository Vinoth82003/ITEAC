<?php

// include_once('autoConfic.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .logoImg{
            width: 100px;
            height: 100px;
        }

        .background{
            position: absolute;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            background-image: url('AI_logo.jpeg');
            background-size: 90%;
            background: #333;
            background-size: 100%;
            background-repeat: no-repeat;
        
        }

        .navbar-expand-lg {
          width: 100vw;
        }

    </style>
</head>
<body style="background-color: #f5f5f5; position: absolute; overflow-x: hidden;">

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #fff;">
    <div class="container nav">
        <a class="navbar-brand" href="#"><img src="logo.jpeg" alt="Logo" class="logoImg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="clubName">
            <h2>Information Technology Experts & Association Club</h2> 
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="nav-link btn btn-link toggle-form" data-form="signin" style="color: #333;"><i class="fas fa-sign-in-alt"></i> &nbsp; Sign In</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link toggle-form" data-form="signup" style="color: #333;"><i class="fas fa-user-plus"></i> &nbsp; Sign Up</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Forms with Close Buttons</title>
    <!-- Add your CSS and Bootstrap links here -->
</head>
<body>
<div class="background">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="message"></div>
            
            <!-- Sign In Form -->
            <form id="signin-form" class="mt-9" method="POST" style="background-color: #fff; padding: 20px; border-radius: 8px; display:none;">
                <button type="button" class="close" data-dismiss="form" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="form-group">
                    <label for="rollno"><i class="fas fa-id-card"></i> Roll Number</label>
                    <input type="text" class="form-control" id="rollno" name="rollno" required>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #007bff;">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
            </form>

            <!-- Sign Up Form -->
            <form id="signup-form" class="mt-6" method="POST" style="background-color: #fff; padding: 20px; border-radius: 8px; display:none;">
                <button type="button" class="close" data-dismiss="form" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="rollno"><i class="fas fa-id-card"></i> Roll Number</label>
                    <input type="text" class="form-control" id="rollno" name="rollno" required>
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success" style="background-color: #28a745;">
                    <i class="fas fa-user-plus"></i> Sign Up
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript to toggle the visibility of the forms when close buttons are clicked
    const closeButtons = document.querySelectorAll('.close');
    closeButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const form = button.closest('form');
            form.style.display = 'none';
        });
    });
</script>

</body>
</html>


<!-- Include Bootstrap JS and jQuery -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>


</body>
</html>
