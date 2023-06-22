<html>
    <head>
        <title>Staff Management</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ="stylesheet" href="mstyle.css">
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
            <a href="newrequest.php">New requests</a><br>
            <a href="#">Approved leave</a><br>
            <a href="#">Rejected leave</a><br>
        </div><br>
</div>
<div class="manage">
    <h3>Staff Management</h3>
</div>

<?php
include('connection.php');

$result = mysqli_query($con,"SELECT * FROM employees");
?>

<html>
 <head>
   <title> Update data</title>
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0){?>

<form action="editstaff.php" method="POST"> 
    
<div class="table-content">
    <table border = "2" cellpadding = "7px" cellspacing="5px">
          <tr>
            <td>Emp_id</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email ID</td>
            <td>Password </td>
            <td>Address</td>
            <td>Gender</td>
            <td>DOB</td>
            <td>Phone No.</td>
            <td>Update</td>
            <td>Remove</td>
          </tr>
                <?php
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                ?>
          <tr>
            <td><?php echo $row["emp_id"]; ?></td>
            <td><?php echo $row["Firstname"]; ?></td>
            <td><?php echo $row["Lastname"]; ?></td>
            <td><?php echo $row["Email"]; ?></td>
            <td><?php echo $row["Password"]; ?></td>
            <td><?php echo $row["Address"]; ?></td>
            <td><?php echo $row["Gender"]; ?></td>
            <td><?php echo $row["DOB"]; ?></td>
            <td><?php echo $row["Phone"]; ?></td>
            <td><a href="editstaff.php?id=<?php echo $row["emp_id"]; ?>">Edit</a></td>
            <td><a href="delete.php?emp_id=<?php echo $row["emp_id"]; ?>">Delete</a></td>
            <!-- <td><button onclick="delete.php?emp_id=<?php echo $row['emp_id'];?>"><i class="fa fa-trash"></i></button></a></td> -->
          </tr>
                <?php
                $i++;
                }
                ?>
    </table>
            
</div>

 <?php
}
else
{
    echo "No result found";
}
?>

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