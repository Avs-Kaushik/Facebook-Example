<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!--<link rel="stylesheet" href="regstyle.css">--> 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
body{
    margin: 0;
    padding: 0;
    background-color: #F0F2F5;
    font-family: 'Montserrat', sans-serif;
    overflow:hidden;
    
}
.main{
    margin: 6%;
    border-radius: 10px;
    box-shadow: 1px 3px 18px 10px rgb(0,0,0,0.3);
    background-color: #FFFFFF;
    min-height:85vh;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    margin-top: 2%;
    border-radius:10px;
}
.box{
    flex:1;
}
.box1{
    background-color: #4a66a0;
    justify-content: center;
    align-items: center;
}
.box2{
    padding: 16px;
}
h2{
 font-family: 'Cairo', sans-serif;
}
table{
    margin-left: 12%;
    margin-top: 3%;
    border-collapse: collapse;
    width:200px;
}
th,td{
    padding:7px;
    
}
input{
    width:300px;
    height:30px;
    font-family: 'Montserrat', sans-serif;
}
h2:hover{
    text-decoration: underline #4a66a0;
}
label:hover{
    text-decoration: underline #4a66a0;

}
#submit{
    padding:3px;
background-color: #42B72A;
width: 200px;
height:40px;
align-items: center;
margin-left: 32%;
border-radius: 7px;
border:none;
color:#FFFFFF;
font-size: 100px solid;
}
#submit:hover{
    cursor: pointer;
}
a{
    text-decoration: none;
    text-align: center;
    margin-left: 32.5%;
    margin-bottom: 5%;
}
    </style>
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="box box1">
            <img width="600px" src="animation.gif" alt="Animated">
        </div>
        <div class="box box2">
            <h2 align="center">Create a new account</h2>
            <form action="verify.php" method="post">
                <table cell-spacing="0px" >
                    <tr>
                        <td><label for="Name">Name:</label></td>
                        <td><input type="text" name="uname" placeholder="Enter your name" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" name="email" placeholder="Enter Valid Email" required></td>
                    </tr>
                    <tr>
                        <td><label for="mobno">Phone:</label></td>
                        <td><input type="numbers" name="phno" placeholder="Enter valid Phone No"></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender:</label></td>
                        <td><select name="gender" id="g">
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                       </select></td>
                    </tr>
                    <tr>
                        <td><label for="dob">DOB</label></td>
                        <td><input type="date" placeholder="Select a Date" name="dob"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" name="pwd" placeholder="Enter Strong Password" required></td>
                    </tr>
                </table>

                <input style="width:12px;" type="checkbox" name="select"><span style="font-size:10px" required>    By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS notifications from us and can opt out at any time.</span>
                <br>
                <input type="submit" name="submit" value="SignUp" id="submit">
                <br>
                <hr>
                <a href="index.php">Already have an account?</a>
            </form>
        </div>
    </div>
</body>
</html>
