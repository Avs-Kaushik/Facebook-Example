<?php
session_start();
$imgno=$_POST["id1"];
$us=$_SESSION["email"];
$fl=$_POST["id"];
$host='localhost';
$username = 'kaushik';
$password = '20092003';
$dbname='kaushik';
$conn=mysqli_connect($host,$username,$password,$dbname);
$ct=mysqli_num_rows(mysqli_query($conn,"SELECT * from likes WHERE file='$fl' AND user IS NOT NULL"));
$tempi=mysqli_num_rows(mysqli_query($conn,"SELECT * from likes WHERE file='$fl' AND user='$us'"));
if($tempi%2==1)
{
    $sql="DELETE from likes WHERE user='$us' AND file='$fl'";
    $upload=mysqli_query($conn,$sql);
}
else{
    $ct++;
    $sql="INSERT into likes(file,like_cnt,user,imgno) VALUES('$fl','$ct','$us','$imgno')";
    $upload=mysqli_query($conn,$sql);
}
header("Location:dash.php");
?>

