<?php
 $conn = mysqli_connect("localhost", "root", "", "leave_management");
  

 if (isset($_REQUEST)) {
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    
       $fname = $_REQUEST['firstname'];
       $lname = $_REQUEST['lastname'];   
       $email = $_REQUEST['email']; 
       $password = $_REQUEST['password']; 
       $address = $_REQUEST['address']; 
       $gender = $_REQUEST['gender']; 
       $dob = $_REQUEST['dob']; 
       $phone = $_REQUEST['phone'];
       $casual = $_POST['casual'];
       $sick = $_POST['sick'];
       $medical = $_POST['medical'];
       
       
   
       $sql = "INSERT INTO manager  (`Firstname`, `Lastname`, `Email`, `Password`, `Address`, `Gender`, `DOB`, `Phone`) VALUES ('$fname','$lname','$email','$password','$address','$gender','$dob','$phone')";
    
        if(mysqli_query($conn, $sql)){
            $M_id = mysqli_insert_id($conn);?>
            <script>
            alert("Data stored in a database successfully.");
            window.location.href = "addmanager.php";
            </script>
        <?php 
         
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        $sqlleave = "INSERT INTO `manager_available_leave` (`ID`, `casual leave`, `sick leave`, `medical leave`) VALUES ('$M_id', '$casual', '$sick', '$medical')";
        if (mysqli_query($conn, $sqlleave))
        { ?>
            <script>
            alert("Data stored in a database successfully.");
            window.location.href = "addmanager.php";
            </script>
        <?php 
         
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
            

 }else{
    echo "no requests";
 }