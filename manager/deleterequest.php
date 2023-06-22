<?php
include ('connection.php');
$sql = "DELETE FROM leaves WHERE emp_id='" . $_GET["emp_id"] . "'";
if (mysqli_query($con, $sql)) {?>
    <script>
    alert("Sucessfully deleted.")
     window.location.href = "edit.php";
    </script>
    <?php

    
} else {
    
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($con);
?>