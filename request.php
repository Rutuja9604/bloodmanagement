<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</link>
<link rel="stylesheet" type="text/css" href="./css/request.css" />
<style>
        .hover_ele2 a:hover{
            background-color:#c52c2c;
            transition:uppercase;
            color:white;
        }
    </style>
</head>
<body>
  <nav>
    <div class="menu-right">
      <label class="logo"></label>
      <span onClick="myfunction()">&#9776;</span>
      <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="AboutuUs.php" target="_parent">About us</a></li>
        <li><a href="feedback.php" target="_parent">Feedback</a></li>
        <li><a href="#" target="_parent">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <form action="" method="post">
      <div class="input-box">
        <h2>Request form</h2>
        <input type="text" placeholder="Name" name="name" required />
        <input type="number" placeholder="Phone Number" name="phone" required />
        <input type="text" placeholder="Address" name="address" required />
        <input type="email" placeholder="Email" name="email" required />
        <input list="bgroup" type="text" placeholder="Blood Group" name="blood_group" required />
        <datalist id="bgroup">
          <option value="A+">A+</option>
          <option value="O+">O+</option>
          <option value="B+">B+</option>
          <option value="AB+">AB+</option>
          <option value="A-">A-</option>
          <option value="O-">O-</option>
          <option value="B-">B-</option>
          <option value="AB-">AB-</option>
        </datalist>

        <input type="number" placeholder="Number of Blood Units" name="num_units" required />
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $blood_group = $_POST["blood_group"];
                $num_units = $_POST["num_units"];

                // Perform basic validation
                if (empty($name) || empty($phone) || empty($address) || empty($email) || empty($blood_group) || empty($num_units)) {
                    echo "Please fill in all the fields.";
                } else {
                    // Database connection details
                  include('./connect/connect.php');

                    // SQL query to insert data into the blood_requests table
                    $sql = "INSERT INTO blood_requests (name, phone, address, email, blood_group, num_units)
                            VALUES ('$name', '$phone', '$address', '$email', '$blood_group', $num_units)";

                    // Execute the query
                    if ($conn->query($sql) === TRUE) {
                        // Display success message
                        echo '<div class="success-message" style="color:green;">Request sent successfully</div>';
                        $conn->close();
                        $_SESSION["req_blood"] = $blood_group;
                        $_SESSION["units"] = $num_units;
                        header("Location: D_list.php");
                        exit();
                    } else {
                        // Display error message
                        echo '<div class="success-message" style="color:red;">Please fill required data or try again later</div>';
                    }
                    
                    // Close the database connection
                    $conn->close();
                    
                }
            } 
          ?>




        <center>
          <button type="submit" value="Submit">Submit</button>
        </center>
      </div>
    </form>
  </div>

  <script>
    function myfunction() {
      var x = document.getElementById("menu");
      if (x.style.display == "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }
  </script>

  <div class="preloader"></div>
  <script>
        let set_title = document.getElementById("nav_title");
        set_title.style.display = "none";
  </script>
  <script src="./js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
