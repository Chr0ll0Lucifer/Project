<?php
session_start();
include('connection.php');
   if (!empty($_POST) ) {
    $status = $_POST['status'];
    $id = $_POST["leaveid"];
    print_r  ($_POST);

    $updateStatusQuery = "UPDATE `managerleaves` SET Status='$status', processed=1 WHERE ID = '$id'";
    if (mysqli_query($con, $updateStatusQuery)) {?>
    <script>
        alert("Status updated successfully") ;
        window.location.href = "newrequest.php";
        </script><?php
    } else {?>
    <script>
        alert ("Error updating status: "); 
        </script><?php
         
    }


    // Fetch leave type and manager ID
    $managerId = $_SESSION['userid'];

    // Check if the leave request has already been processed
    $approvedLeaveQuery = "SELECT Leave_type, DATEDIFF(end_date, start_date) + 1 AS approved_days
                       FROM managerleaves
                       WHERE M_id = '$managerId'
                       AND Status = 'Approve'
                       AND processed = 1";

$approvedLeaveResult = mysqli_query($con, $approvedLeaveQuery);

// Iterate through the approved leave requests and deduct days from manager_available_leave
while ($row = mysqli_fetch_assoc($approvedLeaveResult)) {
    $leaveType = $row['Leave_type'];
    $approvedDays = (int)$row['approved_days'];

    // Update the appropriate variable based on leave type
    if ($leaveType === 'Sick leave') {
        $updateSickQuery = "UPDATE manager_available_leave 
                            SET `sick leave` = `sick leave` - $approvedDays 
                            WHERE ID = '$managerId'";
        mysqli_query($con, $updateSickQuery);
    } elseif ($leaveType === 'Causal leave') {
        $updateCasualQuery = "UPDATE manager_available_leave 
                              SET `casual leave` = `casual leave` - $approvedDays 
                              WHERE ID = '$managerId'";
        mysqli_query($con, $updateCasualQuery);
    } elseif ($leaveType === 'Medical leave') {
        $updateMedicalQuery = "UPDATE manager_available_leave 
                               SET `medical leave` = `medical leave` - $approvedDays 
                               WHERE ID = '$managerId'";
        mysqli_query($con, $updateMedicalQuery);
    }
}

// Clear processed flag for the deducted leave requests
$clearProcessedQuery = "UPDATE managerleaves
                        SET processed = 0
                        WHERE M_id = '$managerId'
                        AND Status = 'Approve'
                        AND processed = 1";
mysqli_query($con, $clearProcessedQuery);
   }







    
