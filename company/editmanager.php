<html>
    <head>
        <title>Edit Staff</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ="stylesheet" href="mstyle.css">
    </head>
    

<body>
    <nav>Employee Leave Management System
    <button  class="drop" onclick="window.location.href='logout.php';">Logout
        </button>
    </nav>

    <div class="sidenav">
        <a href ="companydashboard.php">Dashboard</a><br>
        <a href ="leavetype.php">Leave type</a><br>
        <button class="dropdown-btn">Manager
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addmanager.php">Add</a><br>
            <a href="editform.php">Edit</a>
        </div><br>
        <button class="dropdown-btn">Employee
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="view.php">View</a><br>
            <a href="#">Leave History</a>
        </div><br>
        <br>
    </div>

<?php 

include('connection.php');

$id = $_GET['id'];

$result = mysqli_query($con,"SELECT * FROM manager where M_id = $id");

if (mysqli_num_rows($result) > 0){
     $row = mysqli_fetch_array($result);
 ?>


<fieldset>
    <legend>Staff form</legend>
    <form name="editform" action="editManagerprocess.php" method="post" onsubmit="return editform()">
        <div class="content">
            <br>
            <label>Manager id:</label>
            <input type="text" name ="empid" value="<?php echo $row['M_id'];?>" disabled>
            <label>Firstname:</label>
            <input type="text"  name="firstname" value="<?php echo $row["Firstname"]; ?>">
            <label>Lastname:</label>
            <input type="text"  name="lastname" value="<?php echo $row["Lastname"]; ?>"><br><br>
            <label>Email:</label>
            <input type="email"  name="email" value="<?php echo $row["Email"]; ?>">
            <label>Password:</label>
            <input type="password"  name="password" value="<?php echo $row["Password"]; ?>"><br><br>
            <label>Address:</label>
            <input type="text"  name="address" value="<?php echo $row["Address"]; ?>">
            <label>Gender:</label>
            <input type="radio"  name="gender" value="Male" <?php echo $row["Gender"]=="Male"?"checked":"" ?>>Male
            <input type="radio"  name="gender" value="Female" <?php echo $row["Gender"]=="Female"?"checked":"" ?>>Female<br><br>
            <label>Date of birth:</label>
            <input type="date"  name="dob" value="<?php echo $row["DOB"]; ?>">
            <label>Phone:</label>
            <input type="tel"  name="phone" value="<?php echo $row["Phone"]; ?>"><br><br>
            
            <br><br><br>
            <button type="submit">Edit Manager</button>
        </div>
        </form>
  <?php } ?>
 </fieldset>
 
    <script>
  window.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    form.addEventListener('submit', function() {
      var empIdField = document.querySelector('input[name="empid"]');
      empIdField.disabled = false;
    });
  });
</script>
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
</html>