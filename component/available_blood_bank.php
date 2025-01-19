    
<?php
        include('./connect/connect.php'); // Include your database connection file
        $blood_types = array(
            "A+" => 'a_plus',
            "A-" => 'a_minus',
            "B+" => 'b_plus',
            "B-" => 'b_minus',
            "AB+" => 'ab_plus',
            "AB-" => 'ab_minus',
            "O+" => 'o_plus',
            "O-" => 'o_minus'
        );
        
        // Fetch all blood banks from the database
        $req_type = $_SESSION['req_blood'];
        $units = $_SESSION['units'];
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

        $query_bank = "SELECT * FROM blood_banks WHERE $blood_types[$req_type] >= $units ORDER BY city";
        $result_bank = mysqli_query($conn, $query_bank);
    ?>
     <div class="container">
        <h2>Blood Banks With Available Units</h2>
     </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class='thead-dark'>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Alternate Number</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Avaible Units</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sr=1;
                    // Loop through the result set and display each bank in a table row
                    while ($row_bank = mysqli_fetch_assoc($result_bank)) {
                        echo "<tr>";
                        echo "<td>" . $sr . "</td>";
                        echo "<td>" . $row_bank['name'] . "</td>";
                        echo "<td>" . $row_bank['phone'] . "</td>";
                        echo "<td>" . $row_bank['alternate_phone'] . "</td>";
                        echo "<td>" . $row_bank['email'] . "</td>";
                        echo "<td>" . $row_bank['city'] . "</td>";
                        echo "<td>".$row_bank[$blood_types[$req_type]].'  '.'Unit of'.'  '.$req_type  . "</td>";
                        echo "</tr>";
                        $sr++;
                    }

                    foreach($compatible_types[$req_type] as $sup_group){
                        $query_bank = "SELECT * FROM blood_banks WHERE $blood_types[$sup_group] >= $units ORDER BY city";
                        $result_bank = mysqli_query($conn, $query_bank);
                        while ($row_bank = mysqli_fetch_assoc($result_bank)) {
                            echo "<tr>";
                            echo "<td>" . $sr . "</td>";
                            echo "<td>" . $row_bank['name'] . "</td>";
                            echo "<td>" . $row_bank['phone'] . "</td>";
                            echo "<td>" . $row_bank['alternate_phone'] . "</td>";
                            echo "<td>" . $row_bank['email'] . "</td>";
                            echo "<td>" . $row_bank['city'] . "</td>";
                            echo "<td>".$row_bank[$blood_types[$sup_group]].'  '.'Unit of'.'  '.$sup_group  . "</td>";
                            echo "</tr>";
                            $sr++;
                        }
                    }


                    ?>
                </tbody>
            </table>
        </div>