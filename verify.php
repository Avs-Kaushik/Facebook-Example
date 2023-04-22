<?php
$id=$_POST["uname"];
$email=$_POST["email"];
$pho=$_POST["phno"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$pass=$_POST["pwd"];
$host='localhost';
$username = 'kaushik';
$password = '20092003';
$dbname='kaushik';
$flag=0;
$conn=mysqli_connect($host,$username,$password,$dbname);
if($conn)
{
    echo "Connection Successful.";
}
else{
    die("Connection failed".mysqli_connect_error());
}

$sql="INSERT INTO registrations(Name,Email,Phone,Gender,DOB,Password) VALUES('$id','$email','$pho','$gender','$dob','$pass')";
$sql1="SELECT * FROM registrations WHERE Email='$email'";

if(mysqli_num_rows(mysqli_query($conn,$sql1))>0)
{
    echo "<script>alert('An account with this email already existed. Please verify!');</script>";
    header("refresh:1;url=http://localhost/facebook/register.php");
    $flag=1;
}
$sql2="SELECT * FROM registrations WHERE Phone='$pho'";
if(mysqli_num_rows(mysqli_query($conn,$sql2))>0)
{
    echo "<script>alert('An account with this Phone No already existed. Please verify!');</script>";
    header("refresh:1;url=http://localhost/facebook/register.php");
    $flag=1;
}
if($flag==0){
$upload=mysqli_query($conn,$sql);
if($upload)
{
    echo "<script>alert('data saved successfully. Please Login with new Details');</script>";
    echo "Redirecting in 1s...";
    header("refresh:1;url=http://localhost/facebook/index.php");
}
}
else{
    echo "Error occured";
}
?>
