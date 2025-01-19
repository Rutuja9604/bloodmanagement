<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $opinion = $_POST["opinion"];

    // Database connection details (replace with your actual database credentials)
    include('./connect/connect.php');

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO feedback (full_name, email, opinion) VALUES (?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sss", $full_name, $email, $opinion);

    // Execute the prepared statement
    if ($stmt->execute()) {
        header("Location: feedback.php?status=success");
    } else {
        header("Location: feedback.php?status=error");
    }
    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
