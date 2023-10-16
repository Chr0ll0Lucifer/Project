
<html>
    <head>
        <title>Add staff</title>
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
        <a href="apply.php">Apply leave</a><br>
            <a href="newrequest.php">New requests</a><br>
            <a href="approvedleave.php">Approved leave</a><br>
            <a href="rejectedleave.php">Rejected leave</a><br>
            <a href="leavehistory.php">Leave history</a><br>
        </div><br>
</div>

<fieldset>
    <legend>Staff form</legend>
    <form name="addform" action="addStaffProcess.php" method="post" onsubmit=" return validateform()">
        <div class="content">
            <br>
            <label>Firstname:</label>
            <input type="text"  name="firstname">
            <label>Lastname:</label>
            <input type="text"  name="lastname"><br><br><br>
            <label>Email:</label>
            <input type="email"  name="email">
            <label>Password:</label>
            <input type="password"  name="password"><br><br><br>
            <label>Address:</label>
            <input type="text"  name="address">
            <label>Gender:</label>
            <input type="radio" name="gender" id="g1" value="Male">Male
            <input type="radio" name="gender" id="g2" value="Female">Female<br><br><br>
            <label>Date of birth:</label>
            <input type="date"  name="dob">
            <label>Phone:</label>
            <input type="tel"  name="phone"><br><br><br>
            <input type="text" id="casual" name="casual" value="10" required style="display:none;">
            <input type="text" id="sick" name="sick" value="10" required style="display:none;">
            <input type="text" id="medical" name="medical" value="56" required style="display:none;">
            
            <br><br><br><br>
            <button id="submit" type="submit">Add Staff</button>

        </div>

        </form>

        
    </fieldset>

    <script>
        function validateform(){
            var fname =  /^[A-Za-z\s]+$/;
            var fname = document.addform.firstname.value;
                if(fname==null || fname==""){
                    alert("Firstname cannot blank.");
                    return false;
                }
                else if(!fname.test(fname)){
                    alert("Please enter valid firstname.");
                    return false;
                }
               
            var lname = document.addform.lastname.value;
                if(lname==null || lname==""){
                   alert("Lastname cannot blank.");
                   return false;
                }
                else if(!regname.test(lname)){
                    alert("Please enter valid lastname.");
                    return false;
                }
            
            var emailpattern =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var email=document.addform.email.value;
                if (email==null || email==""){
                    alert("Email cannot be blank.");
                    return false;
                }

                else if(!emailpattern.test(email)){
                    alert("Please enter valid email.");
                    return false;
                }

            var password = document.addform.password.value;
                if (password==null || password==""){
                    alert("Password cannot blank.");
                    return false;
                }
                else if(password.length<6){
                    alert("Password must have atleaset 6 characters.");
                    return false;
                }
                
            var address = document.addform.address.value;
                if (address==null || address==""){
                    alert("Address cannot be blank.");
                    return false;
                }  

            var g1 = document.addform.g1.checked;
            var g2 = document.addform.g2.checked;
                if (g1==false && g2==false){
                    alert("Please select a gender.");
                    return false;
                }   

            var dob = document.addform.dob.value;
                if (dob==null || dob==""){
                    alert("Date of birth cannot be blank.");
                    return false;
                }  
            
            var phonepattern = /^\d{10}$/;
            var phone = document.addform.phone.value;
                if (phone==null || phone==""){
                    alert("Phone number cannot be blank.");
                    return false;
                }  
                else if(!phonepattern.test(phone)){
                    alert("Please enter valid 10-digit phone number.")
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
 </body>   
</html>