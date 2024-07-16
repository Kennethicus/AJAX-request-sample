<?php
// fetch_total_salary.php
header('Content-Type: application/json');

// Database connection details
$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to calculate the total salary
$sql = "SELECT SUM(salary) AS total_salary FROM employees"; // Adjust the query as needed
$result = $conn->query($sql);

$totalSalary = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSalary = $row['total_salary'];
}

echo json_encode(['total_salary' => $totalSalary]);

$conn->close();
?>
