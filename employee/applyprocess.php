<?php
 $conn = mysqli_connect("localhost", "root", "", "leave_management");
  

 if (isset($_REQUEST)) {
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

        $leavetype = $_REQUEST['leave_type']; 
        $applied_date=$_REQUEST['applied_date'];
        $startdate = $_REQUEST['startdate']; 
        $enddate = $_REQUEST['enddate']; 
       $days = $_REQUEST['days']; 
       $reason = $_REQUEST['description'];
       $status=$_REQUEST['status'];
       $empid = $_REQUEST['id'];
     
       
       //$id = "SELECT *FROM leavetype INNER JOIN leaves ON leavetype.L_id = leaves.L_id";
       
       
   
       $sql = "INSERT INTO leaves (`Leave_type`,`Applied_date`, `Start_date`, `End_date`, `No_of_days`, `Description`, `Status`, `emp_id`) VALUES ('$leavetype','$applied_date','$startdate', '$enddate', '$days', '$reason', '$status', '$empid')";
    
        if(mysqli_query($conn, $sql)){?>
            <script>
            alert("Leave application sent sucessfully.");
            window.location.href = "apply.php";
            </script>
        <?php 
         
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
            

 }else{
    echo "no requests";
 }