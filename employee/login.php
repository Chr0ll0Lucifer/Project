<?php
include('connection.php');
session_start();
$name = $_POST['firstname'];
$username = $_POST['email'];
$password = $_POST['password'];

$sql = "select *from employees where Email = '$username' and Password = '$password' and Firstname = '$name'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['uid'] = $row['emp_id'];
            $_SESSION["firstname"] = $_POST["firstname"];
            echo "<h1><center> Login successful </center></h1>";  
            header('location:employeedashboard.php');
        }  
        else{  ?>
        <script>
            alert("Login fail");
            window.location.href = "front.php";
        </script>
        <?php           
        }     
?>  