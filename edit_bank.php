<?php
session_start();
if (!isset($_SESSION["type_ac"])) {
    header("Location: bank_login.php");
    exit();
}

require_once './connect/connect.php'; // Include your database connection file

// Fetch user data from the database based on the user ID in the session
$id = $_SESSION["id"];
$sql = "SELECT * FROM blood_banks WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    // Redirect or handle the case when user data is not found
    header("Location: bank_login.php");
    exit(); // Ensure the script stops here
}

// Update user profile if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Update the user's profile in the database
    $update_sql = $sql = "UPDATE blood_banks SET name='$name', phone='$phone', alternate_phone='$alternate_phone', email='$email', city='$city', password='$password', A_plus='$a_plus', A_minus='$a_minus', B_plus='$b_plus', B_minus='$b_minus', AB_plus='$ab_plus', AB_minus='$ab_minus', O_plus='$o_plus', O_minus='$o_minus' WHERE id='$id'";

    if (mysqli_query($conn, $update_sql)) {
        // Redirect with success status if update is successful
        header("Location: edit_bank.php?status=success");
        exit(); // Ensure the script stops here
    } else {
        // Redirect with error status if update fails
        header("Location: edit_bank.php.php?status=error");
        exit(); // Ensure the script stops here
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/form1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </link>
    <title>Blood Bank Profile</title>
    <style>
        .container_unit {
            display: grid;
            gap: 10px 10px;
            grid-template-columns: auto auto auto auto;
            padding: 10px 0px; 
        }

        .input_box2 {
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php require '././component/navbar.php'; ?>

    <div class="Container" style="margin-top:70px;">
        <form action="" method="post">
            <h2 style="color: white; text-shadow: 1px 1px 5px black;">Update Blood Bank Details</h2>
            <div class="content">
                <div class="input-box">
                    <label for="name">Blood Bank Name</label>
                    <input type="text" placeholder="Enter Blood Bank Name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>

                <div class="input-box">
                    <label for="phone">Contact number</label>
                    <input type="tel" placeholder="Enter Bank's contact number" name="phone" value="<?php echo $row['phone']; ?>" required>
                </div>

                <div class="input-box">
                    <label for="alternate_phone">Alternate number</label>
                    <input type="tel" placeholder="Enter alternate contact number" name="alternate_phone" value="<?php echo $row['alternate_phone']; ?>">
                </div>

                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter valid email address" name="email" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="container_unit">
                    <div class="input-box input-box2">
                        <label for="A+">A+ Units</label>
                        <input type="number" placeholder="Available Unit's" name="A+" value="<?php echo $row['a_plus']; ?>" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="A-">A- Units</label>
                        <input type="number" placeholder="Available Unit's" name="A-" value="<?php echo $row['a_minus']; ?>" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="B+">B+ Units</label>
                        <input type="number" placeholder="Available Unit's" name="B+" value="<?php echo $row['b_plus']; ?>" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="B-">B- Units</label>
                        <input type="number" placeholder="Available Unit's" name="B-" value="<?php echo $row['b_minus']; ?>" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="AB+">AB+ Units</label>
                        <input type="number" placeholder="Available Unit's" name="AB+" value="<?php echo $row['ab_plus']; ?>" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="AB-">AB- Units</label>
                        <input type="number" placeholder="Available Unit's" name="AB-" value="<?php echo $row['ab_minus']; ?>" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="O+">O+ Units</label>
                        <input type="number" placeholder="Available Unit's" name="O+" value="<?php echo $row['o_plus']; ?>" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="O-">O- Units</label>
                        <input type="number" placeholder="Available Unit's" name="O-" value="<?php echo $row['o_minus']; ?>" required>
                    </div>
                </div>


                <div class="input-box" style="justify-content: flex-start;">
                        <label for="city">City</label>
                        <input type="text" placeholder="" name="city" required value = <?php echo $row['city']; ?>>
                </div>

                <div class="input-box" style="justify-content: flex-end;">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Set A Password" name="password" autocomplete="off" value="<?php echo $row['password']; ?>" required />
                </div>



                <!-- Add a submit button -->
                <div class="button-container">
                    <button type="submit">Update Profile</button>
                </div>
            </div>
        </form>
        <!-- Display alert messages based on URL parameters -->
        <?php
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if ($status === 'success') {
                echo '<script>alert("Record updated successfully");</script>';
            } elseif ($status === 'error') {
                echo '<script>alert("Error updating record");</script>';
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>