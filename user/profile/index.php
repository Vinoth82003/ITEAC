<?php 
session_start();
include "../../conn.php";
$rollno = $_SESSION['user_rollno'];

if (!isset($rollno)) {
    header('location:../../');
}
$username = $_SESSION['user_name'];
$email = $_SESSION['user_email'];

$table_names = ["apptitute", "reasoning", "quiz"];

foreach ($table_names as $table_name) {
    // Fetch specific columns (rollno, score, percentage) from the database for the current table
    $query = "SELECT * FROM $table_name WHERE rollno = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $rollno);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the first row of data
        $row = $result->fetch_assoc();

        // Store the specific columns in session variables with unique names
        // $_SESSION[$table_name . '_rank'] = $row['rank'];
        $_SESSION[$table_name . '_score'] = $row['score'];
        $_SESSION[$table_name . '_timeTaken'] = $row['timetaken'];
        $_SESSION[$table_name . '_percentage'] = $row['percentage'];
    }
}

$selectRankSQL = "SELECT overall_rank FROM ranktable WHERE rollno = ?";

// Prepare the statement
$stmt = $conn->prepare($selectRankSQL);

if ($stmt) {
    // Bind the parameter
    $stmt->bind_param("s", $rollno);

    // Execute the statement
    if ($stmt->execute()) {
        // Bind the result variable
        $stmt->bind_result($overallRank);

        // Fetch the result
        $stmt->fetch();

        // Check if a result was found
        if ($overallRank !== null) {
            // Store the overall rank in a session variable
            $_SESSION['overall_rank'] = $overallRank;

            // Close the statement
            $stmt->close();

            // Close the database connection
            $conn->close();
        } else {
            echo "Roll Number $rollno not found in ranktable";
        }
    } else {
        echo "Error executing query: " . $stmt->error;
    }
} else {
    echo "Error preparing statement: " . $conn->error;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="container">
        <a href="../logout.php">logout</a>
        <div class="user_container">
            <div class="card">
                <div class="rank">
                    <h3>#<?php echo $_SESSION['overall_rank']; ?></h3>
                </div>
                <div class="innercard left">
                    <div class="profBackground">
                        <div class="profLetter"><?php echo strtoupper($username[0]); ?></div>
                    </div>
                </div>
                <div class="innercard right">
                    <ul class="userDetails">
                        <li class="name detailsList"><?php echo $username; ?></li>
                        <li class="rollno detailsList">RollNo : <?php echo $rollno; ?></li>
                        <li class="email detailsList">Email : <?PHP echo $email; ?></li>
                        <li class="attemptsname detailsList">Attempts </li>
                        <li class="detailsList attempts">
                            <ul class="attemptsList">
                                <li class="quiz list">Quiz</li>
                                <li class="aptitute list">Aptitute</li>
                                <li class="reasoning list">Reasoning</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="testDisc quizDisc">
            <div class="testDiscHover">  click to close </div>
            <div class="testcard">
                <ul class="testDetails">
                    <li class="testList testName">Name : Quiz</li>
                    <li class="testList">Score : <?php echo $_SESSION['quiz_score']; ?> </li>
                    <li class="testList">Persentage : <?php echo $_SESSION['quiz_percentage']; ?> </li>
                    <li class="testList">Time Taken : <?php echo $_SESSION['quiz_timeTaken']; ?></li>
                </ul>
            </div>
        </div>
        <div class="testDisc aptituteDisc">
            <div class="testDiscHover">  click to close </div>
            <div class="testcard">
                <ul class="testDetails">
                    <li class="testList testName">Name : aptitute</li>
                    <li class="testList">Score : <?php echo $_SESSION['apptitute_score']; ?></li>
                    <li class="testList">Persentage : <?php echo $_SESSION['apptitute_percentage']; ?></li>
                    <li class="testList">Time Taken : <?php echo $_SESSION['apptitute_timeTaken']; ?></li>
                </ul>
            </div>
        </div>
        <div class="testDisc reasoningDisc">
            <div class="testDiscHover">  click to close </div>
            <div class="testcard">
                <ul class="testDetails">
                    <li class="testList testName">Name : reasoning</li>
                    <li class="testList">Score : <?php echo $_SESSION['reasoning_score']; ?></li>
                    <li class="testList">Persentage : <?php echo $_SESSION['reasoning_percentage']; ?></li>
                    <li class="testList">Time Taken : <?php echo $_SESSION['reasoning_timeTaken']; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- js files -->
    <script src="user.js"></script>
</body>
</html>