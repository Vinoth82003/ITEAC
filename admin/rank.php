<?php
include("../conn.php");
// Create the ranktable if it doesn't exist


$createTableSQL = "
CREATE TABLE IF NOT EXISTS ranktable (
    rollno VARCHAR(100),
    overall_score DECIMAL(10, 2),
    overall_percentage DECIMAL(5, 2),
    overall_time_taken INT,
    overall_rank INT
)";

if ($conn->query($createTableSQL) === TRUE) {
    // echo "Table 'ranktable' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$insertDataSQL = "
INSERT IGNORE INTO ranktable (rollno, overall_score, overall_percentage, overall_time_taken, overall_rank)
SELECT
    r.rollno,
    COALESCE(q.score, 0) + COALESCE(a.score, 0) + COALESCE(re.score, 0) AS overall_score,
    (COALESCE(q.percentage, 0) + COALESCE(a.percentage, 0) + COALESCE(re.percentage, 0)) / 3 AS overall_percentage,
    COALESCE(q.timetaken, 0) + COALESCE(a.timetaken, 0) + COALESCE(re.timetaken, 0) AS overall_time_taken,
    RANK() OVER (ORDER BY (COALESCE(q.score, 0) + COALESCE(a.score, 0) + COALESCE(re.score, 0)) DESC) AS overall_rank
FROM
    (SELECT DISTINCT rollno FROM register) AS r
LEFT JOIN
    ranktable rt ON r.rollno = rt.rollno
LEFT JOIN
    quiz q ON r.rollno = q.rollno
LEFT JOIN
    apptitute a ON r.rollno = a.rollno
LEFT JOIN
    reasoning re ON r.rollno = re.rollno
WHERE rt.rollno IS NULL
";

if ($conn->query($insertDataSQL) === TRUE) {
    header('location:admin.php');
} else {
    echo "Error inserting data: " . $conn->error . "<br>";
}
// Close the database connection
$conn->close();
?>
