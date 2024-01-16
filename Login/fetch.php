<?php
// Step 1: Connect to the Database
$host = "localhost";
$username = "formdb_user";
$password = "abc123";
$dbname = "form";

$conn = new mysqli($host, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Query the Database
$sql = "SELECT * FROM signup";
$result = $conn->query($sql);

// Step 3: Fetch Data
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}


// Close the database connection
$conn->close();

// Output the data in JSON format
header('Content-Type: application/json');
echo json_encode($data);


?>


