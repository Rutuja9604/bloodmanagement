<?php
session_start();

if ($_SESSION["user"] != 'admin') {
    header("location: admin_login.php");
}
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

    <style>
        #dwnldBtn{
            background-color: #dc3545; 
            color: #fff; 
            padding: 10px; 
            border: none;
            border-radius: 5px; 
            margin: 2rem 0;
            cursor: pointer;
            display: block;
            margin: auto;
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

    <section>
        <?php
        echo '<nav>
                <div class="menu-right">

                    <span onClick="myfunction()">&#9776;</span>
                    <ul id="menu">
                        <li class="hover_ele2" ><a id="Donors" href="./Donors_list.php">Donors</a></li>';
                        if (!isset($_SESSION['type_ac'])){
                            echo '<li class="hover_ele2" ><a id="Requests" href="Requests_list.php">Requests</a></li>';
                            echo  '<li class="hover_ele2" ><a id="feedbacks" href="feedbacks_list.php">feedbacks</a></li>';
                            echo  '<li class="hover_ele2" ><a id="Banks" href="bank_list.php">Banks</a></li>';
                            echo  '<li class="hover_ele2" ><a id="Home" href="./admin_index.php">Home</a></li>';
                        }
                        else{
                            echo '<li class="hover_ele2" ><a id="Requests" href="req_ListForBank.php">Requests</a></li>';
                            echo  '<li class="hover_ele2" ><a id="Home" href="./bank_index.php">Home</a></li>';
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
    </section>
    <div class="container">
        <h2>Blood Banks List</h2>

    </div>
    <?php
    // Database connection
    include('./connect/connect.php');
    // Fetching data from the donors table
    $query = "SELECT * FROM blood_banks";
    $result = mysqli_query($conn, $query);

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
        // Output Bootstrap table headers
        echo "<table id='dataTable' class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Sr</th>";
        echo "<th>Bank Name</th>";
        echo "<th>Contact</th>";
        echo "<th>Alternate</th>";
        echo "<th>Email</th>";
        echo "<th>City</th>";
        echo "<th>A+ Units</th>";
        echo "<th>A- Units</th>";
        echo "<th>B+ Units</th>";
        echo "<th>B- Units</th>";
        echo "<th>AB+ Units</th>";
        echo "<th>AB- Units</th>";
        echo "<th>O+ Units</th>";
        echo "<th>O- Units</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Output data rows
        $sr_no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $sr_no . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['alternate_phone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['a_plus'] . "</td>";
            echo "<td>" . $row['a_minus'] . "</td>";
            echo "<td>" . $row['b_plus'] . "</td>";
            echo "<td>" . $row['b_minus'] . "</td>";
            echo "<td>" . $row['ab_plus'] . "</td>";
            echo "<td>" . $row['ab_minus'] . "</td>";
            echo "<td>" . $row['o_plus'] . "</td>";
            echo "<td>" . $row['o_minus'] . "</td>";
            echo "</tr>";
            $sr_no = $sr_no+ 1;
        }

        echo "</tbody>";
        echo "</table>";
        echo "<button id='dwnldBtn'>
                Download Excel Sheet
        </button>
        ";
    } else {
        echo "No records found";
    }

    mysqli_close($conn);
    ?>



    <!-- Your page content goes here -->

    <script src="./js/script.js"></script>
    <script>
        let set_active = document.getElementById("Banks");
        set_active.className = "active";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#dwnldBtn').on('click', function () {
                $("#dataTable").table2excel({
                    filename: "Bank_List.xls"
                });
            });
        });
    </script>




</body>


</html>