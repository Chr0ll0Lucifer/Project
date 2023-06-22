<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave Management System</title>
</head>
<style>
    img{
        height: 700px;
        width: 1200px;
        margin-top:  20px;
        margin-left: 110px;
        border-radius: 20px;
    }
    body{
        background-color: lightblue;
        left: 20%;
        right: 20%;
    }

h2,h1{
    text-align: center;
    font-size: 40px;
    font-weight: bold
}
    .container{
        
        background-color: aliceblue;
        padding:18px;
        width:350px;
        height:525px;
         border-radius:30px ;
         top: 24%;
         left: 73%;
         position: absolute;
    }
     
     input[type=text] , input[type=password]{
        width: 100%;
        padding :15px 17px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 17px;
     }
     label{
        font-size: 22px;
     }
     button{
        width: 63px;
        height: 35px;
        font-size: 20px;
     }
     a{
        font-size: 19px;
     }
    
</style>
<body>
    
    <h1>Employee Leave Management System</h1>
    <img src="group-business.jpg">
    <form action="login.php" method="POST" name="myform" onsubmit="validate()">
        <div class="container">
            <h2>Welcome</h2>
            <label>Name</label>
            <input type="text" placeholder="Enter name" name="firstname"><br><br>
            <label>Email ID</label>
            <input type="text" placeholder="Enter email ID" name="email">
            <br><br><label>Password</label>
            <input type="password" placeholder="Enter password" name="password">
            <br><br><br><center><button type="submit">Login</button></center>
            <br><br>
           <a href="#"><center>Forgot password?</center></a>
        </div>
    </form>
   

    <script>
        function validate(){
            var Regname =  /^[A-Za-z\s]+$/;
            var firstname = document.myform.firstname.value;
                if(firstname==null || firstname==""){
                    alert("Firstname cannot blank.");
                    return false;
                }
                else if(!Regname.test(firstname)){
                    alert("Please enter valid firstname.");
                    return false;
                }

             var emailpattern =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var email = document.myform.email.value;
            if(email == null || email == ""){
                alert("Email cannot be blank.")
                return false;
            }
            else if(!emailpattern.test(email)){
                    alert("Please enter valid email.");
                    return false;
                }

            var password = document.myform.password.value;
            if(password == null || password == ""){
                alert("Password cant be blank.")
                return false;
            }
        }
    </script>
</body>
</html>