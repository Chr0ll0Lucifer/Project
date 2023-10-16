<?php
session_start();
include('connection.php');
?>

<html>
    <head>
        <title>Employee Dashborad</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ="stylesheet" href="style.css">
    </head>
    

<body>
    <nav>Employee Leave Management System
      <button  class="drop" onclick="window.location.href='logout.php';">Logout
    </button>      
    </nav>


    <div class="sidenav">
        <a href ="employeedashboard.php">Dashboard</a><br>
        <button class="dropdown-btn">Leave
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="apply.php">Apply leave</a><br>
            <a href="leavehistory.php">Leave History</a>
        </div><br>
        <br>
    </div>

    <?php 

$id = $_REQUEST['id']; 
$status = $_REQUEST['status'];


$result = mysqli_query($con,"SELECT * FROM leaves where ID = $id  AND Status = 'Pending'");

if (mysqli_num_rows($result) > 0){
     $row = mysqli_fetch_array($result);
  
 ?>

<fieldset>
    <legend>Update Request</legend>
    <form name="updateform" action="update_leave_request_process.php" method="post" onsubmit="return validate()">
        <div class="content">
            <br>
            <label>Emp ID:</label>
            <input type="text" name="id" value="<?php echo $row["emp_id"]; ?>" disabled><br><br>
            <label>Staff name:</label>
            <?php
            $result1 = mysqli_query($con,"SELECT * FROM employees where emp_id='". $row['emp_id']."'"); 
            $row1 = mysqli_fetch_array($result1);
            ?>
            <input type="hidden" name="leaveid" value="<?php echo $_GET['id']?>">
            <input type="text" name="staffname" value="<?php echo $row1["Firstname"]; ?>" disabled><br><br>
            <label>Leave type:</label>
            <input type="text" name="leavename" value="<?php echo $row["Leave_type"]; ?>" disabled>
            <br><br>
            <label>Reason:</label>
            <input type="text" name="description" value="<?php echo $row["Description"]; ?>" disabled><br><br>
            <label>Applied date:</label>
            <input type="date" name="applied" value="<?php echo $row["Applied_date"]; ?>" disabled><br><br>
            <label>Start date:</label>
            <input type="date" name="start"  id="start" value="<?php echo $row["Start_date"]; ?>" >
            <label>End date:</label>
            <input type="date" name="end" id="end" value="<?php echo $row["End_date"]; ?>" >
            <label>Number of leave days:</label>
            <input type="number" name="days" id="days" value="<?php echo $row["No_of_days"]; ?>" disabled><br><br>

            <label style="display:none;">Status:</label>
            <input type="radio" name="status"  value="Pending" style="display:none;" checked><p style="display:none;">Pending</p>
            <input type="radio" name="status"  value="Approve" style="display:none;">
            <input type="radio" name="status"  value="Reject" style="display:none;"><br><br><br>

                <button type="submit">Update</button>
</div>
</form>
</fieldset>
<?php
} else {?>
<script>
    alert ("Update is only allowed for pending requests.");
    window.location.href = "leavehistory.php";
    </script>
    <?php
}

?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
            var start_date = document.getElementById('start');
            var end_date = document.getElementById('end');
            var days_field = document.getElementById('days');

            end_date.addEventListener("change", function() {
                const d = start_date.value;
                const date1 = new Date(d);
                const date2 = new Date(this.value);
                const diffTime = Math.abs(date2 - date1);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                days_field.value = diffDays + 1;
            });

            end_date.dispatchEvent(new Event('change'));
        });

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display == "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }

    function validate(){
        var currentdate = new Date().toISOString().split('T')[0];;
            var startdate=document.updateform.start.value;
             var enddate=document.updateform.end.value;
                
             if(startdate < currentdate){
                  alert("Date cannot be in past.");
                  return false;
                }

            else if(startdate > enddate){
                  alert("End date should be greater then start date.");
                  return false;
                }
            }
        
  </script>