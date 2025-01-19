<?php
include('../connect/connect.php');

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $table_name = $_GET['from_table'];
   if($id == 'all_records'){

    
    $sql = "TRUNCATE TABLE $table_name";

    if ($conn->query($sql) === TRUE) {
        echo "All records deleted successfully";

    } else {
        echo "Error deleting records: " . $conn->error;
    }

    // Close the database connection
    $conn->close();



   
}
   else{

    $sql = "DELETE FROM $table_name WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
   }
} else {
    echo "Error: ID parameter is missing";
}
?>
