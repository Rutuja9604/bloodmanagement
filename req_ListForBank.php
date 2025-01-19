<?php
    // Start session and check if user is logged in as admin
    session_start();
    if ($_SESSION["user"] != 'admin' && $_SESSION["type_ac"] != "bank" ) {
        header("location: admin_login.php");
        exit(); // Stop further execution
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Requests List</title>
    <link rel="stylesheet" href="./css/indexstyle.css">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Outfit';
            background: #ffdad5;
            /* max-width: fit-content; */

        }
    </style>
        <style>
        #dwnldBtn{
            background-color: #198754;
            color: #fff; 
            padding: 10px; 
            border: none;
            border-radius: 5px; 
            margin: 2rem 10px;
            cursor: pointer;
            min-width: 150px;
        }
        #dwnldBtn2{
            color: #fff; 
            padding: 10px; 
            border: none;
            border-radius: 5px; 
            margin: 2rem 0;
            cursor: pointer;
            min-width: 150px;
        }
    </style>
    <style>
            .hover_ele2 a:hover{
                background-color:#c52c2c;
                transition:uppercase;
                color:white;
            }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- table2excel jQuery plugin CDN -->
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

</head>

<body>
    <?php
        echo '<nav>
                <div class="menu-right">

                    <span onClick="myfunction()">&#9776;</span>
                    <ul id="menu">
                        <li class="hover_ele2"><a id="Donors" href="./Donors_list.php">Donors</a></li>
                        <li class="hover_ele2"><a id="Requests" href="req_ListForBank.php">Requests</a></li>';

                        if ($_SESSION['type_ac'] != "bank" ){
                            echo '<li class="hover_ele2"><a id="feedbacks" href="feedbacks_list.php">feedbacks</a></li>';
                        }
                        if ($_SESSION['type_ac'] = "bank" ){
                            echo  '<li class="hover_ele2"><a id="feedbacks" href="./bank_index.php">Home</a></li>';
                        }
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
                                            echo '<li><a class="dropdown-item" href="edit_bank.php">Update Profile</a></li>';
                                        }
                                        echo '<li style="width:100%"><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            </li>';
        } else {
            echo '<li><a href="login.php" target="_parent">Login</a></li>';
        }
        echo '</ul>
                </div>
            </nav>';
    ?>
    <div class="container">
        <h2>Blood Requests List</h2>
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Blood Group</th>
                        <th>Number of Units</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection
                    include('./connect/connect.php');

                    // Fetching data from the blood_requests table
                    $query = "SELECT * FROM blood_requests";
                    $result = mysqli_query($conn, $query);

                    // Display data rows
                    $sr_no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr id='row-" . $row['id'] . "'>";
                        echo "<td>" . $sr_no . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['blood_group'] . "</td>";
                        echo "<td>" . $row['num_units'] . "</td>";
                        echo "</tr>";
                        $sr_no++;
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        let set_active = document.getElementById("Requests");
        set_active.className = "active";
    </script>


    

</body>

</html>
