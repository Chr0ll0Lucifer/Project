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
    <a href ="companydashboard.php">Dashboard</a><br>
        <button class="dropdown-btn">Manager
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addmanager.php">Add</a><br>
            <a href="editform.php">View</a><br>
            <a href="newrequest.php">Leave request</a><br>
            <a href="managerleavehistory.php">Leave history</a>

        </div><br>
        <button class="dropdown-btn">Employee
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="view.php">View</a><br>
            <a href="employeeleavehistory.php">Leave History</a>
        </div><br>
        <br>
    </div>

    <h3>Leave History</h3>
<?php
     $uid = $_SESSION['uid'];
  $sql = "SELECT * FROM leaves";
  $result = mysqli_query($con, $sql);
  $status = 0;
  if (mysqli_num_rows($result) > 0 ) { ?>
  
  <form action="" method="POST"> 
      
  <div class="table-content">
      <table border = "2" cellpadding = "10px" cellspacing="7px" width = "100%">
            <tr>
              <td>Emp_ID</td>
              <td>Leave type</td>
              <td>Applied date</td>
              <td>Start date</td>
              <td>End date</td>
              <td>No_of_days</td>
              <td>Description</td>
              <td>Status</td>
            <tr>

            <?php
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                ?>
          <tr>
            <td><?php echo $row["emp_id" ]; ?></td>
            <td><?php echo $row["Leave_type" ]; ?></td> 
            <td><?php echo $row["Applied_date" ]; ?></td>  
            <td><?php echo $row["Start_date" ]; ?></td>  
            <td><?php echo $row["End_date" ]; ?></td>  
            <td><?php echo $row["No_of_days" ]; ?></td>  
            <td><?php echo $row["Description" ]; ?></td>  
            <td><?php echo $row["Status" ]; ?></td>  

            
            </tr>
            <?php
                $i++;
                }
                ?>
  <?php      
}
?>
</table> 

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