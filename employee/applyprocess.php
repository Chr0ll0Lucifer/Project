<?php
$conn = mysqli_connect("localhost", "root", "", "leave_management");

if (isset($_REQUEST)) {
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    $leavetype = $_REQUEST['leave_type']; 
    $applied_date = $_REQUEST['applied_date'];
    $startdate = $_REQUEST['startdate']; 
    $enddate = $_REQUEST['enddate']; 
    $days = $_REQUEST['days']; 
    $reason = $_REQUEST['description'];
    $status = $_REQUEST['status'];
    $empid = $_REQUEST['id'];

    // Check if employee has already applied for leave on the selected dates
    $sql_check_leave = "SELECT * FROM leaves WHERE emp_id = '$empid' AND ((Start_date BETWEEN '$startdate' AND '$enddate') OR (End_date BETWEEN '$startdate' AND '$enddate'))";
    $result_check_leave = mysqli_query($conn, $sql_check_leave);

    if (mysqli_num_rows($result_check_leave) > 0) {
        ?>
        <script>
            alert("You have already applied for leave on one of the selected dates.");
            window.location.href = "apply.php";
        </script>
        <?php
    } else {
        $sql_check_leave_entitlement = "SELECT `$leavetype` FROM employees_available_leave WHERE ID = '$empid'";
        $result_check_leave_entitlement = mysqli_query($conn, $sql_check_leave_entitlement);
    
        if ($result_check_leave_entitlement) {
            $row = mysqli_fetch_assoc($result_check_leave_entitlement);
            $leave_entitlement = $row[$leavetype];
    
            if (!is_null($leave_entitlement) && $leave_entitlement >= $days) {
                // Proceed with leave application
                $new_leave_entitlement = $leave_entitlement - $days;
                $sql_update_leave_entitlement = "UPDATE employees_available_leave SET `$leavetype` = '$new_leave_entitlement' WHERE ID = '$empid'";
                mysqli_query($conn, $sql_update_leave_entitlement);

                $sql = "INSERT INTO leaves (`Leave_type`,`Applied_date`, `Start_date`, `End_date`, `No_of_days`, `Description`, `Status`, `emp_id`) VALUES ('$leavetype','$applied_date','$startdate', '$enddate', '$days', '$reason', '$status', '$empid')";

                if (mysqli_query($conn, $sql)) {
                    ?>
                    <script>
                        alert("Leave application sent successfully.");
                        window.location.href = "apply.php";
                    </script>
                    <?php
                } else {
                    echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
                }
            } else {
                ?>
                <script>
                    alert("You do not have enough leave days available for this type of leave.");
                    window.location.href = "apply.php";
                </script>
                <?php
            }
        } else {
            echo "Error fetching leave entitlement: " . mysqli_error($conn);
        }
    }
} else {
    echo "no requests";
}

mysqli_close($conn);
?>
