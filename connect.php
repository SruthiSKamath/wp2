<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Retrieve form data
$email = isset($_POST['email']) ? $_POST['email'] : '';
$psw = isset($_POST['psw']) ? $_POST['psw'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';

// Validate mandatory fields
if (empty($email) || empty($psw) || empty($gender)) {
    die("All fields are required. Please go back and fill in the form completely.");
}

// Database connection
// $conn = new mysqli('localhost', 'root', '', 'test'); // Adjust your credentials if need

// Check for connection error
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO registration (email, psw, gender) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Preparation Failed: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("sss", $email, $psw, $gender);

// Execute the query
if ($stmt->execute()) {
    echo "Registration Successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
