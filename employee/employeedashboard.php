<?php
session_start();
include('connection.php');

?>
<html>
    <head>
        <title>Employee Dashborad</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ="stylesheet" href="estyle.css">
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

    <div class = "main">
       <div class="image">
         <img src = "pic.png">
      </div>
      <div class ="text">
        <h2>  
         <?php
          if (isset($_SESSION['firstname'])) {
                 $name = $_SESSION['firstname'];
                    echo "Welcome, " . $name . "!";
}?>
  </h2>
</div>
    </div>
    <h3 style="margin-left:17%;"> Your Leave days</h3>
      <div class="leave-boxes">
    <?php
    // Fetch manager ID from session
    $empId = $_SESSION['uid']; // Replace with your session variable name for manager ID
    
    // Fetch data from manager_available_leave
    $query = "SELECT `casual leave`, `sick leave`, `medical leave`, 'maternity leave' FROM employees_available_leave WHERE ID = '$empId'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $casualLeave = $row['casual leave'];
        $sickLeave = $row['sick leave'];
        $medicalLeave = $row['medical leave'];
        $maternityLeave = $row['maternity leave'];
              
        
                echo '<div class="leave-box">';
                echo '<h3>Casual Leave</h3>';
                echo '<p>' . $casualLeave . '</p>';
                echo '</div>';

                echo '<div class="leave-box">';
                echo '<h3>Sick Leave</h3>';
                echo '<p>' . $sickLeave . '</p>';
                echo '</div>';

                echo '<div class="leave-box">';
                echo '<h3>Medical Leave</h3>';
                echo '<p>' . $medicalLeave . '</p>';
                echo '</div>';

                


            } else {
                echo 'No leave data available.';
            }
            ?>
        </div>
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