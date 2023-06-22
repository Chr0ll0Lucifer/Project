<?php
include ('connection.php');
$sql = "DELETE FROM manager WHERE M_id='" . $_GET["M_id"] . "'";
if (mysqli_query($con, $sql)) {?>
    <script>
    alert("Sucessfully deleted.")
     window.location.href = "editform.php";
    </script>
    <?php

    
} else {
    
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($con);
?>