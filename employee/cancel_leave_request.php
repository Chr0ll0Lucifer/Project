<?php
session_start();
include('connection.php');

$id = $_GET['id']; // Get the ID from the URL
$status = $_GET['status']; // Get the status from the URL

if ($status == "cancelled") {
    // Check if the request status is 'pending'
    $sql_check_status = "SELECT status FROM leaves WHERE ID = '$id'";
    $result = mysqli_query($con, $sql_check_status);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];

        if ($status == "Pending") {
            // Update the status to 'cancelled'
            $sql_cancel_request = "UPDATE leaves SET status = 'cancelled' WHERE ID = '$id'";

            if(mysqli_query($con, $sql_cancel_request)){
                ?>
                <script>
                    alert("Leave application cancelled successfully.");
                    window.location.href = "leavehistory.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("An error occurred while cancelling the leave application.");
                    window.location.href = "leavehistory.php";
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Cancellation is not allowed after the request has been <?php echo $status; ?>");
                window.location.href = "leavehistory.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Unable to retrieve request status.");
            window.location.href = "leavehistory.php";
        </script>
        <?php
    }
} elseif ($status == "update") {
    // Handle update logic here (if needed)
    // You can use $id to identify which request to update
    // ...
} else {
    ?>
    <script>
        alert("Invalid status parameter.");
        window.location.href = "leavehistory.php";
    </script>
    <?php
}

mysqli_close($con);
?>
