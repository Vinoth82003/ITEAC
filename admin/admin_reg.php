<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    <style>
        body {
			margin: 0;
			padding: 0;
			background-color: #f1f1f1;
		}
		.container {
			margin: 100px auto;
			width: 400px;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}
        .username{
			margin: 100px auto;
			width: 310px;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}
        h2 {
			text-align: center;
			color: #333;
		}
        input{
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
        button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
    </style>
</head>
<body>
    
    <div class="head">
        <h2>Admin Register</h2>
    </div>

    <form method="post" action="admin_reg.php">
        <div class="username">
            <h3>Enter Login Details</h3>
            <table style="font-size:15px;">

                <tr>
                    <td><b>Username</b></td>
                    <td><input type="text" placeholder="Enter Username" name="username" id="username" required></td>
                </tr>

                <tr>
                    <td><b>Password:</b></td>
                    <td><input type="password" placeholder="Enter Password" name="password" id="password" required></td>
                </tr>

            </table>
        </div>
        <button type="submit" name="submit">Login</button>
    </form>

<?php

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "admin" && $password == "admin") {
        header('Location: admin.php'); // Redirect to admin.php
        exit; // Ensure that the script stops executing after the redirect
    }
}

?>

    
</body>
</html>