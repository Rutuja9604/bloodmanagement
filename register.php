<?php
// Database connection details (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donor_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $password = $_POST["password"];

    // Perform additional validation if needed

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database (replace 'users' with your actual table name)
    $sql = "INSERT INTO users (username, email, age, password) VALUES ('$username', '$email', '$age', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        // Redirect to login page or any other page after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
