<?php
include 'conn.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function validate($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }

    $uname = validate($_POST['name']);
    $rawrollno = validate($_POST['rollno']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    $rollno = strtolower($rawrollno);
    // Check if email already exists
    $checkMailQuery = "SELECT * FROM `register` WHERE `rollno` = ?";
    $stmt = $conn->prepare($checkMailQuery);
    $stmt->bind_param("s", $rollno);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $response['status'] = 'error';
        $response['message'] = 'You have already Registered.';
    } else {
        // Hash the password using password_hash() function
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertQuery = "INSERT INTO `register` (`name`,`rollno`,`email`,`password`,`accept`) VALUES (?, ?, ?, ?, null)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $uname,$rollno, $email, $hashedPassword);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Registred successfully .';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong.';
        }
    }

    echo json_encode($response);
    $stmt->close();
    $conn->close();
}
?>
