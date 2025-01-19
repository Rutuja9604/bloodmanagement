<?php
    session_start();
?>

<!doctype html>

<html>

<head>
    <title>Raktarpan </title>
    <link rel="stylesheet" href="./css/indexstyle.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </link>
    <style>
        body {
            font-family: 'Outfit';
            background: #ffdad5;
            /* max-width: fit-content; */

        }
    </style>
</head>

<body>

    <section>
        <?php
        echo '<nav>
                <div class="menu-right">

                    <span onClick="myfunction()">&#9776;</span>
                    <ul id="menu">
                        <li><a id="Donors" href=".request.php">Donors</a></li>
                        <li><a id="feedbacks" href="index.php">Home</a></li>';
        if (isset($_SESSION['user'])) {
            // echo '<li><a href="logout.php" target="_parent">' .$_SESSION['user']. '</a></li>';
            // echo '<li><a href="logout.php" target="_parent">Logout</a></li>';
            echo                             '<li>
                                <div class="dropdown-center">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Wel-Come ' . $_SESSION['user'] . '
                                    </button>
                                    <ul class="dropdown-menu">';
                                        if ($_SESSION["user"] != 'admin') {
                                            echo '<li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>';
                                        }
                                        echo '<li style="width:100%"><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            </li>';
        } else {
            // echo '<li><a href="login.php" target="_parent">Login</a></li>';
        }
        echo '</ul>
                </div>
            </nav>';
        ?>
    </section>
    
    <?php 
        include('./component/available_blood_bank.php');
    ?>


    <div class="container">
        <h2>Matching Donors List</h2>
    </div>
    <?php
        // Database connection
        include('./connect/connect.php');
        $compatible_types = array(
            "A+" => array("A-", "O+", "O-"),
            "A-" => array("O-"),
            "B+" => array("B-", "O+", "O-"),
            "B-" => array("O-"),
            "AB+" => array("A+", "A-", "B+", "B-","AB-", "O+", "O-"),
            "AB-" => array("A-", "B-", "O-"),
            "O+" => array("O-"),
            "O-" => array("O-")
        );
        $req_type = $_SESSION['req_blood'];
        
        
        // Prepare a SQL statement with a parameter for blood group
        
        // Build the IN clause for the compatible blood types
        $blood_types_list = "'" . implode("','", $compatible_types[$req_type]) . "'";
        
        // Fetch donors from the database with compatible blood types
        $three_months_ago = date('Y-m-d', strtotime('-3 months'));
        $query = "SELECT * FROM donors WHERE blood_group = '$req_type' AND last_donation_date <= '$three_months_ago' order by city";
        // $query = "SELECT * FROM donors WHERE blood_group = '$req_type'";
        $result = mysqli_query($conn, $query);
        if($req_type != "O-"){
            $query2 = "SELECT * FROM donors WHERE blood_group IN ($blood_types_list) AND last_donation_date <= '$three_months_ago' order by city";
            // $query2 = "SELECT * FROM donors WHERE blood_group IN ($blood_types_list)";
            $result2 = mysqli_query($conn, $query2);
        }
        // Check if there are any records
        if (mysqli_num_rows($result) > 0) {
            // Output Bootstrap table headers
            echo "<table class='table  table-striped'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th>Sr</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone</th>";
            echo "<th>City</th>";
            echo "<th>Blood Group</th>";
            echo "<th>Last Donation Date</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Output data rows
            $sr_no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $sr_no . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['blood_group'] . "</td>";
                echo "<td>" . $row['last_donation_date'] . "</td>";
                echo "</tr>";
                $sr_no++;
            }
            if(isset($result2)){
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td>" . $sr_no . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['blood_group'] . "</td>";
                    echo "<td>" . $row['last_donation_date'] . "</td>";
                    echo "</tr>";
                    $sr_no++;
                }
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No records found";
        }

        mysqli_close($conn);
    ?>



    <!-- Your page content goes here -->

    <script src="./js/script.js"></script>
    <script>
        let set_active = document.getElementById("Donors");
        set_active.className = "active";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>


</html>