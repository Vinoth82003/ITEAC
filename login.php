<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include 'conn.php'; // Make sure this includes your database connection code

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function validate($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }

    $rollno = validate($_POST['rollno']);
    $newRoll = strtolower($rollno);
    $loginPassword = validate($_POST['password']);

    $sql = "SELECT *FROM register WHERE rollno=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $newRoll);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbHashedPassword = $row['password'];

        if (password_verify($loginPassword, $dbHashedPassword)) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_rollno'] = $row['rollno'];
            $_SESSION['user_email'] = $row['email'];

            // Assuming you have defined 'user' and 'error' status in your JavaScript
            $response['status'] = 'user';
            $response['message'] = 'Login successful.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid roll number or password. Please try again.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'You are Not registered Yet';
    }

    // header('Content-Type: application/json');
    echo json_encode($response); // Send JSON response
    $stmt->close();
    $conn->close();
}
?>
