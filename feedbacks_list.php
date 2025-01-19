<?php
session_start();

if ($_SESSION["user"]!= 'admin') {
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
                    <li><a id="Donors" href="./Donors_list.php">Donors</a></li>
                    <li><a id="Requests" href="Requests_list.php">Requests</a></li>
                    <li><a id="feedbacks" href="feedbacks_list.php">feedbacks</a></li>
                    <li><a id="Banks" href="bank_list.php">Banks</a></li>
                    <li class="hover_ele2" ><a id="Home" href="./admin_index.php">Home</a></li>';
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
            echo '<li><a href="login.php" target="_parent">Login</a></li>';
        }
        echo '</ul>
                </div>
            </nav>';
        ?>
    </section>
    <div class="container">
        <h2>Feedback List</h2>
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Sr</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Opinion</th>
                        <th>Submission Time</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection
                    include('./connect/connect.php');
                    // Fetching data from the donors table
                    $query = "SELECT * FROM feedback";
                    $result = mysqli_query($conn, $query);
                    // Display data rows
                    $sr_no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr id='row-" . $row['id'] . "'>";
                        echo "<td>" . $sr_no . "</td>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['opinion'] . "</td>";
                        echo "<td>" . $row['submission_time'] . "</td>";
                        echo "<td><button type='button' class='btn btn-danger' onclick='deleteRecord(" . $row['id'] . ")'>Delete</button></td>";
                        echo "</tr>";
                        $sr_no++;
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            <div style="align-items: center;display: flex;justify-content: space-between; width:60vw">
                <button id="dwnldBtn2" type='button' class='btn btn-danger' onclick='deleteRecord("all_records")'>Delete All</button>
                <button id="dwnldBtn">Download Excel Sheet</button>
            </div>
        </div>
    </div>



    <!-- Your page content goes here -->

    <script src="./js/script.js"></script>
    <script>
        let set_active = document.getElementById("feedbacks");
        set_active.className = "active";
    </script>
    <script>
            $(document).ready(function () {
                $('#dwnldBtn').on('click', function () {
                    var tableClone = $('#dataTable').clone();
                    tableClone.find('th:last-child, td:last-child').remove();

                    tableClone.table2excel({
                        filename: "Feedback_list.xls"
                    });
                });
            });
</script>
<script>
        function deleteRecord(id) {
            console.log("deleting");
            if (id == 'all_records') {
                if (confirm('Are you sure you want to delete All this record?')) {
                    $.ajax({
                        url: './component/delete.php', 
                        type: 'GET',
                        data: {
                            delete_id: id,
                            from_table: 'feedback' 
                        },
                        success: function(response) {
                            // Remove the deleted row from the table
                            console.log(response);
                            $('#dataTable tbody').empty();
                            alert(response);
                        },
                        error: function(xhr, status, error) {
                            alert('Error deleting record: ' + error);
                        }
                    });
                }
            } 
            else {
                if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                        url: './component/delete.php', 
                        type: 'GET',
                        data: {
                            delete_id: id,
                            from_table: 'feedback'
                        },
                        success: function(response) {
                            // Remove the deleted row from the table
                            console.log(response);
                            $('#row-' + id).remove();
                            alert('Record deleted successfully!');
                        },
                        error: function(xhr, status, error) {
                            alert('Error deleting record: ' + error);
                        }
                    });
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>


</html>