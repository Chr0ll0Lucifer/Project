<?php

include('connection.php');
   if (!empty($_POST) ) {
    $status = $_POST['status'];
    $id = $_POST["id"];

    $sql = "UPDATE `leaves` set  Status='$status' where ID = $id";

    mysqli_query($con,$sql);
    if($sql)
    {
        ?>
        <script>
    alert("Sucessfully responded.")
     window.location.href = "newrequest.php";
    </script>
    <?php    
    }

    
   }
    ?>