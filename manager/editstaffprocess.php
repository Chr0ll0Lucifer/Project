<?php

include('connection.php');
    print_r($_POST);
   if (!empty($_POST) ) {
    $eid = $_POST['empid'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $sql = "UPDATE employees set  Firstname ='$fname',lastname = '$lname',email='$email',password ='$password',address ='$address',gender='$gender',dob = '$dob',phone='$phone' where emp_id = $eid";
    mysqli_query($con,$sql);
    if($sql)
    {
        ?>
        <script>
    alert("Sucessfully updated.")
     window.location.href = "edit.php";
    </script>
    <?php    
    }

    
   }
    ?>