<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $name = $_POST["name"];
                $age = $_POST["age"];
                $weight = $_POST["weight"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $city = $_POST["city"];
                $blood_group = $_POST["blood_group"];
                $last_donation_date = $_POST["last_donation_date"];
                $gender = $_POST["gender"];
                $password = $_POST["password"];

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Database connection details
                include('./connect/connect.php');

                // Check if donor with the same email already exists
                $checkSql = "SELECT * FROM donors WHERE email = '$email' OR phone = '$phone'";
                $result = $conn->query($checkSql);

                if ($result->num_rows > 0) {
                    // Donor with the same email already exists
                    echo '<div class="error-message" style="color:red;">Donor with the same email or phone number is already exists. Please try to login</div>';
                } else {
                    // Donor doesn't exist, proceed with the insertion
                    $insertSql = "INSERT INTO donors (name, age, weight, email, phone, city, blood_group, last_donation_date, gender, password)
                                VALUES ('$name', '$age', '$weight', '$email', '$phone', '$city', '$blood_group', '$last_donation_date', '$gender', '$hashedPassword')";

                    // Execute the query
                    if ($conn->query($insertSql) === TRUE) {
                        // Registration successful
                        echo '<div class="success-message" style="color:green;">Thanks for registering as a Donor.     <a href="./login.php">Click here to Login.</a></div>';
                    } else {
                        // Registration failed
                        // echo '<div class="error-message" style="color:red;">Registration failed. Please try again.</div>';
                    }
                }

                // Close the database connection
                $conn->close();
            }
            exit() 
        ?>