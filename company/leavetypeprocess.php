<?php
 $conn = mysqli_connect("localhost", "root", "", "leave_management");
  

 if (isset($_REQUEST)) {
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    
       $leavename = $_REQUEST['leavetype'];  
       $description = $_REQUEST['description']; 
       $days = $_REQUEST['days']; 

    
   
       $sql = "INSERT INTO leavetype  (`Leave_type`, `Description`, `no of days`) VALUES ('$leavename','$description','$days')";
    
        if(mysqli_query($conn, $sql)){?>
            <script>
            alert("Data stored successfully.");
            window.location.href = "leavetype.php";
            </script>
        <?php 
         
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
            

 }else{
    echo "no requests";
 }
 
 