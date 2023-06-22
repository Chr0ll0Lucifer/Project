<?php
session_start();
include('connection.php');

?>
<html>
    <head>
        <title>Apply from</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ="stylesheet" href="mstyle.css">
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
    
    <fieldset>
    <legend>Apply leave form</legend>
    <form name="applyform" action="applyprocess.php" method="post" onsubmit="return validate()">
        <div class="content">
            <br>
            <label>Employee ID:</label>
            <input type="text" name="id" value="<?php echo $_SESSION['uid']; ?> " readonly><br><br>
            <label>Select leave type:</label>
            <select  id="select" name="leave_type">
                <option value="">Select leave type..</option>
                <?php $sql = "SELECT Leave_type from leavetype";
                $result = $con->query($sql);

                if($result->num_rows > 0){
                  while ($row = $result->fetch_object()) {
                    ?>
                    <option value="<?php echo htmlentities($row->Leave_type); ?>">
                    <?php echo htmlentities($row->Leave_type); ?>
                    </option>
                    <?php
                }
              }?>
</select><br><br>
              <input type="text" id="appliedDate" name="applied_date"  style="display:none;"readonly >
                <label>Start leave date:</label>
                <input type="date" name="startdate" id="start_date"><br><br>
                <label>End leave date:</label>
                <input type="date" name="enddate" id="end_date"><br><br>
                <label>Number of days:</label>
                <input type="number" name="days" id="days" readonly><br><br>

                <label>Reason for leave: </label>
                <textarea name = "description" rows="6" cols="40"></textarea>
                <br><br><br><br>

                <label style="display:none;">Status:</label>
            <input type="radio" name="status"  value="Pending" style="display:none;" checked><p style="display:none;">Pending</p>
            <input type="radio" name="status"  value="Approve" style="display:none;">
            <input type="radio" name="status"  value="Reject" style="display:none;"><br><br><br>

                <button type="submit">Apply</button>
</div>
</form>
</fieldset>



<script>
  end_date.addEventListener("change", function() {
    const d = document.getElementById('start_date').value;
    const date1 = new Date(d);
    const date2 = new Date(this.value);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    if (diffDays == 0) {
      document.getElementById("days").value = 1;
    } else {
      document.getElementById("days").value = diffDays + 1;
    }
  });
  function validate(){
          
            var leave_type=document.getElementById('select').value;
                if (leave_type === ''){
                    alert("Please select leave type.");
                    return false;
                }
            
            var currentdate = new Date().toISOString().split('T')[0];;
            var startdate=document.applyform.startdate.value;
                if (startdate==null || startdate==""){
                    alert("Start date cannot be blank.");
                    return false;
                } 
                else if(startdate < currentdate){
                  alert("Date cannot be in past.");
                  return false;
                }

                var enddate=document.applyform.enddate.value;
                if (enddate==null || enddate==""){
                    alert("End date cannot be blank.");
                    return false;
                } 
                else if(startdate > enddate){
                  alert("End date should be greater then start date.");
                  return false;
                }

                var days=document.applyform.days.value;
                if (days==null || days==""){
                    alert("Number of days cannot be blank.");
                    return false;
                } 

                else if(days<0){
                  alert("Days cannot be in negative.");
                  return false;
                }

                var reason=document.applyform.description.value;
                if (reason==null || reason==""){
                    alert("Reason for leave cannot be blank.");
                    return false;
                } 

                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().slice(0, 10);
                document.getElementById("appliedDate").value = formattedDate;
          }
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
</body> 
</html>