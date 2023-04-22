<?php
session_start();
$uuname=$_SESSION["uname"];
$c=$_POST["bxi"];
$ck=$_POST["id1"];
$image_name=$_POST["id"];
$host='localhost';
$username = 'kaushik';
$password = '20092003';
$dbname='kaushik';
$conn=mysqli_connect($host,$username,$password,$dbname);
if($c=="")
{
    $ok=1;
}
else
{
$k=mysqli_query($conn,"INSERT into comments(name,imgno,file,cmt) VALUES('$uuname','$ck','$image_name','$c')");
}
header("Location:dash.php");
?>