<?php
include '../conn.php';

// Define the default table name
$table_name = "apptitute";

// Map table names to columns
$table_columns = [
    "register" => ["id", "name", "rollno", "email", "accept"],
    "apptitute" => ["id", "rollno", "percentage", "score", "timetaken"],
    "reasoning" => ["id", "rollno", "percentage", "score", "timetaken"],
    "quiz" => ["id", "rollno", "percentage", "score", "timetaken"],
];

// Determine the table name based on the submitted form
if (isset($_POST['register'])) {
    $table_name = "register";
} elseif (isset($_POST['apptitude'])) {
    $table_name = "apptitute";
} elseif (isset($_POST['reasoning'])) {
    $table_name = "reasoning";
} elseif (isset($_POST['quiz'])) {
    $table_name = "quiz";
}

// Fetch data from the selected table
$sql = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Include SheetJS library -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script> -->
</head>
<body>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-3">
            <form method="post">
                <button class="btn btn-success btn-block" type="submit" name="apptitude">
                    <i class="fas fa-calculator"></i> Aptitude
                </button>
            </form>
        </div>
        <div class="col-3">
            <form method="post">
                <button class="btn btn-primary btn-block" type="submit" name="reasoning">
                    <i class="fas fa-brain"></i> Reasoning
                </button>
            </form>
        </div>
        <div class="col-3">
            <form method="post">
                <button class="btn btn-warning btn-block" type="submit" name="quiz">
                    <i class="fas fa-question-circle"></i> Quiz
                </button>
            </form>
        </div>
        <div class="col-3">
            <form method="post">
                <button class="btn btn-info btn-block" type="submit" name="register">
                    <i class="fas fa-registered"></i> Registration
                </button>
            </form>
        </div>
        <div class="col-3">
            <form action = 'rank.php' method="post">
                <button class="btn btn-success btn-block" type="submit" name="apptitude">
                    <i class="fas fa-calculator"></i> Generate Overall Rank
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Display the records in a Bootstrap table -->
<div class="container mt-5">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <?php foreach ($table_columns[$table_name] as $columnName) : ?>
                    <th><?= $columnName ?></th>
                <?php endforeach; ?>
                <?php if ($table_name !== 'register') : ?>
                    <th>Rank</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                // Create an array to store user data for ranking
                $user_data = [];

                while ($row = mysqli_fetch_assoc($result)) {
                    // Check if 'score' exists in the table before calculating rank
                    if (isset($row['score'])) {
                        // Calculate the custom score (you can use your ranking logic here)
                        // For this example, let's assume a simple ranking based on the 'score' column
                        $customScore = $row['score'];

                        // Store user data for ranking
                        $user_data[] = [
                            'data' => $row,
                            'customScore' => $customScore,
                        ];
                    } else {
                        // If 'score' doesn't exist in the table, set a placeholder value
                        $user_data[] = [
                            'data' => $row,
                            'customScore' => null,
                        ];
                    }
                }

                // Sort users by customScore in descending order to find the rank
                usort($user_data, function ($a, $b) {
                    return ($b['customScore'] ?? 0) - ($a['customScore'] ?? 0);
                });

                // Initialize rank
                $rank = 1;

                foreach ($user_data as $user) {
                    $userData = $user['data'];

                    echo '<tr>';
                    foreach ($table_columns[$table_name] as $columnName) {
                        echo '<td>' . $userData[$columnName] . '</td>';
                    }
                    if ($table_name !== 'register') {
                        echo '<td>' . ($user['customScore'] ? $rank : '') . '</td>';
                        $rank = $user['customScore'] ? $rank : null;
                        $userId = $user['data']['id']; // Assuming 'id' is the primary key of your table
                
                        // Prepare and execute the UPDATE query
                        $updateQuery = "UPDATE $table_name SET rank = ? WHERE id = ?";
                        $stmt = $conn->prepare($updateQuery);
                        $stmt->bind_param("ii", $rank, $userId);
                        $stmt->execute();
                    }
                    echo '</tr>';

                    if ($table_name !== 'register') {
                        $rank++;
                    }
                }

            } else {
                echo '<tr>';
                echo '<td colspan="' . (count($table_columns[$table_name]) + 1) . '">No records found</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Button to export table data to CSV -->
<div class="container mt-3">
    <button id="export-btn" class="btn btn-primary" onclick="exportToCSV()">Export to CSV</button>
</div>

<!-- JavaScript for exporting table data to CSV -->
<script>
function exportToCSV() {
    // Select the table you want to export
    var table = document.querySelector("table");

    // Create a CSV string from the table data
    var csv = [];
    var rows = table.querySelectorAll("tr");
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText);
        }
        csv.push(row.join(","));
    }
    var csvString = csv.join("\n");

    // Create a Blob object containing the CSV data
    var blob = new Blob([csvString], { type: "text/csv" });

    // Create a URL for the Blob object
    var url = window.URL.createObjectURL(blob);

    // Create a link element to trigger the download
    var a = document.createElement("a");
    a.href = url;
    a.download = "<?php echo $table_name;?>.csv";
    a.style.display = "none";

    // Append the link to the body and trigger the click event
    document.body.appendChild(a);
    a.click();

    // Clean up
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
}
</script>

</body>
</html>
<!-- php -->
