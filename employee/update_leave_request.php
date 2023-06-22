<?php
session_start();
include('connection.php');
$status = $_GET['status'];
if ($status == "cancelled") {
$id  = $_SESSION['uid'];
$sql = "update leaves set status ='$status' where emp_id = '$id'";
if(mysqli_query($con, $sql)){?>
    <script>
    alert("Leave application sent sucessfully.");
    window.location.href = "leavehistory.php";
    </script>
<?php 
 
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}
} else {
    echo "update process comming soon ....!";
    ?>
    <a href="leavehistory.php">Go back</a>
<?php
}
?>