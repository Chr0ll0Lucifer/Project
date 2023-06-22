<html>
    <head>
        <title>Leave type</title>
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
    <fieldset>
      <legend>Leave type</legend>
        <form name="leavetype" action="leavetypeprocess.php" method="post" onsubmit="return validate()">
          <div class="content">
            <label>Leave type:</label>
            <input type="text" name="leavetype"><br><br>
            
            <label>No. of days:</label>
            <input type="number" name="days"><br><br>

            <label>Description:</label>
            <textarea  name="description" rows="3" cols="20"></textarea>
            <br><br><br><br>

            <button type="submit">Add leave</button>
          <div>
        </form>
    </fieldset>
      
<script>
  function validate(){
    var RegName =  /^[A-Za-z\s]+$/;
            var leavetype = document.leavetype.leavetype.value;
                if(leavetype==null || leavetype==""){
                    alert("Leavetype cannot blank.");
                    return false;
                }
                else if(!RegName.test(leavetype)){
                    alert("Please enter valid leavetype.");
                    return false;
                }

            var number =  /^[0-9\s]+$/;
              var days = document.leavetype.days.value;
              if(days<0){
                alert("Number of days cannot be negative.")
                return false;
              }

              else if(!number.test(days)){
                alert("Please enter valid days.");
                return false;
              }

            var desscription =  document.leavetype.description.value;
            if(desscription==null || desscription==""){
                    alert("desscription cannot blank.");
                    return false;
                }

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