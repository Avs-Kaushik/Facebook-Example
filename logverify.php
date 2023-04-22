<?php
session_start();
$id=$_POST["uname"];
$pass=$_POST["pwd"];
$host='localhost';
$username = 'kaushik';
$password = '20092003';
$dbname='kaushik';
$conn=mysqli_connect($host,$username,$password,$dbname);
$sql="SELECT Name FROM registrations WHERE Email='$id' AND Password='$pass'";
$upload=mysqli_query($conn,$sql);
if(mysqli_num_rows($upload)>0)
{
    $_SESSION["uname"]=mysqli_fetch_array($upload)[0];
    $_SESSION["email"]=$id;
    header("Location:dash.php");
}
else{
    echo "<script>alert('Invalid Credentials. Please confirm your SignUp!');</script>";
    echo "<br>";
    echo "Redirecting in 1 sec...";
    header("refresh: 1; url = http://localhost/facebook/");
}
?>

