<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'iteac'; // Replace with your actual database name

// Create a connection to MySQL
$conn = new mysqli($dbhost, $dbuser, $dbpassword);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't already exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql) === TRUE) {
    echo "Database '$dbname' created or already exists.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Close the connection to the MySQL server
$conn->close();

// Reconnect to the newly created 'test' database
$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the 'register' table
$createRegisterTableSQL = "
CREATE TABLE IF NOT EXISTS register (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    rollno VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    accept VARCHAR(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

// SQL query to create the 'reasoning' table
$createReasoningTableSQL = "
CREATE TABLE IF NOT EXISTS reasoning (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    percentage FLOAT DEFAULT NULL,
    score INT(11) DEFAULT NULL,
    rollno VARCHAR(50) DEFAULT NULL,
    finished VARCHAR(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

// SQL query to create the 'quiz' table
$createQuizTableSQL = "
CREATE TABLE IF NOT EXISTS quiz (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    percentage FLOAT DEFAULT NULL,
    score INT(11) DEFAULT NULL,
    rollno VARCHAR(50) DEFAULT NULL,
    finished VARCHAR(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

// sql query for 'apptitue 

$createApptTableSQL = "
CREATE TABLE IF NOT EXISTS apptitute (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    percentage FLOAT DEFAULT NULL,
    score INT(11) DEFAULT NULL,
    rollno VARCHAR(50) DEFAULT NULL,
    finished VARCHAR(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";


// Execute the SQL queries to create the tables
if ($conn->query($createRegisterTableSQL) === TRUE) {
    echo "Table 'register' created successfully<br>";
} else {
    echo "Error creating table 'register': " . $conn->error . "<br>";
}

if ($conn->query($createReasoningTableSQL) === TRUE) {
    echo "Table 'reasoning' created successfully<br>";
} else {
    echo "Error creating table 'reasoning': " . $conn->error . "<br>";
}

if ($conn->query($createQuizTableSQL) === TRUE) {
    echo "Table 'quiz' created successfully<br>";
} else {
    echo "Error creating table 'quiz': " . $conn->error . "<br>";
}

if ($conn->query($createApptTableSQL) === TRUE) {
    echo "Table 'apptitute' created successfully<br>";
} else {
    echo "Error creating table 'quiz': " . $conn->error . "<br>";
}

// Close the connection to the 'test' database
$conn->close();
?>
