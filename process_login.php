<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["user"];
    $password = $_POST["password"];

    // Validate the login credentials (replace this with your actual authentication logic)
    if ($username == "your_username" && $password == "your_password") {
        // Redirect to index.php
        header("Location: index.php");
        exit(); // Make sure to stop further execution after the redirect
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "Invalid request.";
}
?>
