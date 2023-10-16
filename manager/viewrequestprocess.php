<?php
session_start();
include('connection.php');

if (!empty($_POST)) {
    $status = $_POST['status'];
    $id = $_POST["leaveid"];
    $reason = $_POST["response_reason"];
    print_r($_POST);

    $updateStatusQuery = "UPDATE `leaves` SET Status='$status', processed=1, Response_reason = '$reason' WHERE ID = '$id'";
    if (mysqli_query($con, $updateStatusQuery)) {
        // Check if the leave request has been approved
        if ($status === 'Approve') {
            // Fetch leave type and manager ID
            $empId = $_SESSION['uid'];

            $leaveQuery = "SELECT Leave_type, DATEDIFF(end_date, start_date) + 1 AS approved_days
                           FROM leaves
                           WHERE ID = '$id'
                           AND Status = 'Approve'";

            $leaveResult = mysqli_query($con, $leaveQuery);

            if ($row = mysqli_fetch_assoc($leaveResult)) {
                $leaveType = $row['Leave_type'];
                $approvedDays = (int)$row['approved_days'];

                // Update the appropriate variable based on leave type
                if ($leaveType === 'Sick leave') {
                    $updateSickQuery = "UPDATE availableleave 
                                        SET `sick leave` = `sick leave` - $approvedDays 
                                        WHERE ID = '$empId'";
                    mysqli_query($con, $updateSickQuery);
                } elseif ($leaveType === 'Causal leave') {
                    $updateCasualQuery = "UPDATE availableleave 
                                          SET `casual leave` = `casual leave` - $approvedDays 
                                          WHERE ID = '$empId'";
                    mysqli_query($con, $updateCasualQuery);
                } elseif ($leaveType === 'Medical leave') {
                    $updateMedicalQuery = "UPDATE availableleave 
                                           SET `medical leave` = `medical leave` - $approvedDays 
                                           WHERE ID = '$empId'";
                    mysqli_query($con, $updateMedicalQuery);
                }
            }
        }

        ?>
        <script>
            alert("Status updated successfully");
            window.location.href = "newrequest.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Error updating status: <?php echo mysqli_error($con); ?>");
        </script>
        <?php
    }
}
