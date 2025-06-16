<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="loginStyle.css" />
    <title>Register</title>
    <script>
        function validateForm() {
            // Get form inputs
            var username = document.forms["registrationForm"]["username"].value;
            var email = document.forms["registrationForm"]["email"].value;
            var age = document.forms["registrationForm"]["age"].value;

            // Perform validation
            if (username === "") {
                alert("Username is required");
                return false;
            }

            if (email === "") {
                alert("Email is required");
                return false;
            }
            if (age === "") {
                alert("Age is required");
                return false;
            }

            // Additional validation, e.g., email format
            var emailFormat = /\S+@\S+\.\S+/;
            if (!emailFormat.test(email)) {
                alert("Invalid email format");
                return false;
            }

            // All validations passed
            return true;
        }
    </script>
</head>

<body>
    <nav>
        <div class="menu-right">
            <span onClick="myfunction()">&#9776;</span>
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">ContactUs</a></li>
                <li><a href="AboutuUs.php" target="_parent">About us</a></li>
                <li><a href="feedback.php" target="_parent">Feedback</a></li>
                <li><a href="#" target="_parent">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="register.php" method="post" name="registrationForm" onsubmit="return validateForm()">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required />
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required />
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required />
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required />
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required />
                </div>

                <div class="link">
                    Already have an account? <a href="login.php">Sign in</a>
                </div>
            </form>
        </div>
    </div>

    <div class="preloader"></div>

    <!-- Your page content goes here -->
    <script src="script.js"></script>
</body>

</html>