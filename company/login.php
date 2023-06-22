<?php
include('connection.php');
session_start();
$name = $_POST['firstname'];
$username = $_POST['email'];
$password = $_POST['password'];

$sql = "select *from company where c_email = '$username' and password = '$password' and c_name = '$name'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['uid'] = $row['c_id'];
            $_SESSION["c_name"] = $_POST["c_name"];
            echo "<h1><center> Login successful </center></h1>";  
            header('location:companydashboard.php');
        }  
        else{  ?>
        <script>
            alert("Login fail");
            window.location.href = "front.php";
        </script>
        <?php           
        }     
?>  