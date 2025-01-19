<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once './connect/connect.php';

    // Fetch form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $alternate_phone = !empty($_POST['alternate_phone']) ? $_POST['alternate_phone'] : '0000000000';
    $email = $_POST['email'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $a_plus = $_POST['A+'];
    $a_minus = $_POST['A-'];
    $b_plus = $_POST['B+'];
    $b_minus = $_POST['B-'];
    $ab_plus = $_POST['AB+'];
    $ab_minus = $_POST['AB-'];
    $o_plus = $_POST['O+'];
    $o_minus = $_POST['O-'];

    // Check if contact number and email already exist
    $check_query = "SELECT * FROM blood_banks WHERE phone = '$phone' OR email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Bank already has an account, redirect to login page
        echo '<div class="error-message" style="color:red;">Bank with the same email or phone number is already exists. <a href="./bank_login.php">Click here to Login.</a></div>';
        exit();
    } else {
        // Insert new record
        $insert_query = "INSERT INTO blood_banks (name, phone, alternate_phone, email, city, password, a_plus, a_minus, b_plus, b_minus, ab_plus, ab_minus, o_plus, o_minus) 
                        VALUES ('$name', '$phone', '$alternate_phone', '$email', '$city', '$password', '$a_plus', '$a_minus', '$b_plus', '$b_minus', '$ab_plus', '$ab_minus', '$o_plus', '$o_minus')";
        if (mysqli_query($conn, $insert_query)) {
            // Record inserted successfully, redirect with success message
            echo '<div class="success-message" style="color:green;">Thanks for registering Your Blood Bank.     <a href="./bank_login.php">Click here to Login.</a></div>';
            exit();
        } else {
            // Error inserting record, redirect with error message

            exit();
        }
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Redirect to form page if accessed directly without submitting the form
    header("Location: ./blood_bank.php");
    exit();
}
?>
