<?php
$error = false;


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a_username = $_POST["username"];
    $ppassword = $_POST["password"];
    
    include('./connect/connect.php');
    // Prepare a SQL statement to retrieve user information
    $sql = "SELECT * FROM `blood_banks` WHERE email = '$a_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, fetch user details
        $row = $result->fetch_assoc();
        $user = $row["name"];
        $dbpassword = $row["password"]; // Assuming password is stored as hashed in the database
        $id = $row["id"];

        // Verify password using password_verify function
        if ($ppassword==$dbpassword) {
            // Password is correct, create session and redirect
            session_start();
            $_SESSION["user"] = $user;
            $_SESSION["id"] = $id;
            $_SESSION["type_ac"] = "bank";
            $_SESSION["loggedin"] = true;
            header("Location: bank_index.php");
            exit();
        } else {
            // Invalid password
            $error = "Invalid password";
        }
    } else {
        // User not found
        $error = "User not found";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/loginStyle.css">
    <style>
        .hover_ele2 a:hover{
            background-color:#c52c2c;
            transition:uppercase;
            color:white;
        }
    </style>
    <style>
        nav {
            height: 70px;
        }

        .alert-container {
            margin: 10px;
        }
    </style>
    <title>Login</title>
</head>

<body>
    
    <?php
        require '././component/navbar.php';
    ?>
    <?php if ($error): ?>
        <div class="alert-container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $error; ?>!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="box form-box">
            <header>Blood Bank Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Email</label>
                    <input type="username" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

            </form>
        </div>
    </div>
    <div class="preloader"></div>
    <!-- Your page content goes here -->
    <script src="./js/script.js"></script>
    <script>
        let set_active = document.getElementById("Home");
        set_active.className = "active";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>