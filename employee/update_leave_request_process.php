<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_date = $_POST['start'];
    $end_date = $_POST['end'];
    $days = $_POST['days'];
    $id = $_POST['leaveid'];
    print_r ($_POST);

    // Validate the dates if necessary
    
    // Update the leave request in the database
    $updateQuery = "UPDATE leaves SET Start_date='$start_date', End_date='$end_date',No_of_days='$days' WHERE ID='$id'";
    
    if(mysqli_query($con, $updateQuery)){
        if (mysqli_affected_rows($con) > 0) {?>
    <script>
        alert("Updated successfully.");
        window.location.href = "leavehistory.php";
    </script>
    <?php
    } else {?>
    <script>
        alert ("Error updating leave request: <?php echo mysqli_error($con); ?>");
        </script>
        <?php
    }
} else {
    echo "Invalid request method";
}
}
?>
