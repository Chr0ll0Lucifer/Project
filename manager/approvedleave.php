<!DOCTYPE html>
<html>
<head>
    <title>Approved Leave Requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mstyle.css">
</head>
<body>
<nav>Employee Leave Management System
      <button  class="drop" onclick="window.location.href='logout.php';">Logout
    </button>      
    </nav>


    <div class="sidenav">
        <a href ="managerdashboard.php">Dashboard</a><br>
        
        <button class="dropdown-btn">Staff
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addstaff.php">Add staff</a><br>
            <a href="edit.php">Manage staff</a>
        </div><br>
        <button class="dropdown-btn">Leave
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
        <a href="apply.php">Apply leave</a><br>
            <a href="newrequest.php">New requests</a><br>
            <a href="approvedleave.php">Approved leave</a><br>
            <a href="rejectedleave.php">Rejected leave</a><br>
            <a href="leavehistory.php">Leave history</a><br>
        </div><br>
    </div>

    <div class="manage">
        <h3>Approved leave</h3>
    </div>

    <div class="table-content-request">
        <table border="2" cellpadding="10px" cellspacing="7px" width="90%">
            <tr>
                <td>EMP ID</td>
                <td>Start date</td>
                <td>End date</td>
                <td>No of days</td>
                <td>Description</td>
                <td>Status</td>
                <td>Leave type</td>
                <td>Applied date</td>
            </tr>
            <?php
           $host = "localhost";
           $user = "root";
           $password = "";
           $db_name = "leave_management";
           
           $con = mysqli_connect($host,$user,$password,$db_name);
           
           if(mysqli_connect_errno()){
               die("Failed to connect with MYSQL".mysqli_connect_error());
           }

            // Retrieve approved leave requests from the database
            $sql = "SELECT * FROM leaves WHERE status = 'approve'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $empId = $row['emp_id'];
                    $startdate = $row['Start_date'];
                    $enddate = $row['End_date'];
                    $noofdays = $row['No_of_days'];
                    $description = $row['Description'];
                    $status = $row['Status'];
                    $leaveType = $row['Leave_type'];
                    $appliedDate = $row['Applied_date'];

                    // Retrieve employee details from employees table
                    $result1 = mysqli_query($con, "SELECT * FROM employees WHERE emp_id='$empId'");
                    $row1 = mysqli_fetch_assoc($result1);

                    echo "<tr>";
                    echo "<td>$empId</td>";
                    echo "<td>$startdate</td>";
                    echo "<td>$enddate</td>";
                    echo "<td>$noofdays</td>";
                    echo "<td>$description</td>";
                    echo "<td>$status</td>";
                    echo "<td>$leaveType</td>";
                    echo "<td>$appliedDate</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No approved leave requests.</td></tr>";
            }
            

            // Close the database connection
            mysqli_close($con);
            ?>
        </table>
    </div>
    <script>
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
  </script>
</body>
</html>