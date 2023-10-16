<?php
include('connection.php');
session_start();
$name = $_POST['firstname'];
$username = $_POST['email'];
$password = $_POST['password'];

$sql = "select *from manager where Email = '$username' and Password = '$password' and Firstname = '$name'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
            $_SESSION['userid'] = $row['M_id']; 
            $_SESSION["firstname"] = $_POST["firstname"];

            $managerId = $row['M_id'];
            $leaveIdQuery = "SELECT ID FROM manager_available_leave WHERE ID = '$managerId'";
            $leaveIdResult = mysqli_query($con, $leaveIdQuery);
            $leaveIdRow = mysqli_fetch_assoc($leaveIdResult);
            $_SESSION['manager_available_leave_id'] = $leaveIdRow['ID'];
            echo "<h1><center> Login successful </center></h1>";  
            header('location:managerdashboard.php');
        }  
        else{  ?>
        <script>
            alert("Login fail");
            window.location.href = "front.php";
        </script>
        <?php           
        }     
?>  