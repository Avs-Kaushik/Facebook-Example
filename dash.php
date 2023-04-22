<?php
session_start();
if(empty($_SESSION["uname"]))
{
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@500&display=swap');
    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: #000000;
    margin-left:95%;
    font-size:30px;
    }
    body{
        background-color:#F0F2F5;
        font-family: 'Saira Condensed', sans-serif;
    }
    p{
        margin:0%;
    }
    #iid{
        text-align:right;
    }
    .container{
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;

    }
    .box{
        min-height:80vh;
        margin:1%;
        box-shadow:0px 3px 18px rgba(0,0,0,0.3);
        border-radius:8px;
        padding:25px;
    }
    .box1{
        flex:1;
    }
    .box2{
        flex:2;
    }
    h2:hover{
        text-decoration:underline blue;
    }
    #in1{
        width:320px;
    }
    #in{
        width:350px;
    }
    .container1{
        display:flex;
        flex-wrap:wrap;
        flex-direction:row;
    }
    .boxx{
        margin:1%;
        padding:15px;
        box-shadow:box-shadow:1px 2px 12px rgba(0,0,0,0.1);
    }
    button{
        background-color:#EEEEEE;
        border-collapse:collapse;
        border:1px solid #CCCCCC;
    }
    button:hover{
        cursor:pointer;
    }
    #value1{
        margin-left:-5%;
        width:100px;
        height:100px;
    }
    #value1:hover{
        cursor:pointer;
    }
</style>
</head>
<body>
    <img style="width:240px;height:140px;margin-left:45%;" src="logo.png" alt="">
    <p id="iid" style="font-size:25px">Welcome <b><?php echo $_SESSION["uname"];?></b></p>
    <p id="iid"><a style="text-decoration:none;font-size:18px" href="logout.php">Logout</a></p>
    <div class="container">
        <div class="box box1">
            <h2 align="center">Upload Your Image!</h2>
            <hr>
<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
        <?php
        if(isset($_POST['submit'])){
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    #echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $email=$_SESSION["email"];
    $name=$_SESSION["uname"];
    $file="uploads/".$_FILES["fileToUpload"]["name"];
    $imgno=count(glob("uploads/*"));
    $host='localhost';
    $username = 'kaushik';
    $password = '20092003';
    $dbname='kaushik';
    $flag=0;
    $conn=mysqli_connect($host,$username,$password,$dbname);
    if($conn)
    {
        #echo "Connection Successful.";
    }
    else{
        die("Connection failed".mysqli_connect_error());
    }

    $sql="INSERT INTO images(imgno,file,name,gmail) VALUES('$imgno','$file','$name','$email')";
    $st=0;
    $var1=mysqli_query($conn,"INSERT into likes(file,like_cnt,imgno) VALUES('$file','$st','$imgno')");
    $upload=mysqli_query($conn,$sql);
    if($upload)
    {
        echo "<img id='in' src=$file alt='Uploaded Image'>";
    }
    else{
        echo "Error occured";
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}}
?>
<div>
    <hr>
    <h4 align="center">Your previous uploads</h4>
        <?php
        $temp=$_SESSION["email"];
        $host='localhost';
        $username = 'kaushik';
        $password = '20092003';
        $dbname='kaushik';
        $conn=mysqli_connect($host,$username,$password,$dbname);
        $rows=mysqli_query($conn,"SELECT * from images WHERE gmail='$temp'");
        while($row=mysqli_fetch_array($rows))
        {
        $g=$row["file"];
        $temp=mysqli_query($conn,"SELECT * from likes WHERE file='$g' AND user IS NOT NULL");
        $p=mysqli_num_rows($temp);
        ?>
        <div class="boxx">
            <label style="margin-left:12%;" for=""><?php echo $row["imgno"].")".$row["file"]?></label>
            <label style="margin-left:35%" for="">Likes <?php echo $p?></label>
            <img width="250px" style="margin-left:12%;" src="<?php echo $row["file"]?>" alt="image">
        </div>
        <?php
        }?>
</div>
        </div>
        <div class="box box2">
                <h2 align="center">Your Feed..</h2>
                <hr>
            <div class="container1">
                <?php
                $host='localhost';
                $username = 'kaushik';
                $password = '20092003';
                $dbname='kaushik';
                $flag=0;
                $conn=mysqli_connect($host,$username,$password,$dbname);
                if($conn)
                {
                    #echo "Connection Successful.";          
                    $select_path="select * from images";
                    $var=mysqli_query($conn,$select_path);
                    ?>

                        <?php  
                        while($row=mysqli_fetch_array($var)){
                        $image_name=$row["file"];
                        $ck=$row["imgno"];
                        $uname=$row["name"];
                        $p=mysqli_num_rows(mysqli_query($conn,"SELECT * from likes WHERE file='$image_name' AND user IS NOT NULL"));
                        ?>
                        <div class="boxx">
                            <h3><?php echo $uname;?></h3>
                            <hr>
                            <img id="in1" src=<?php echo $image_name?> alt="Image">
                            <br>
                            <form action="likes.php" method="post">
                            <input type="hidden" name="id1" value="<?php echo $ck;?>">
                            <input type="hidden" name="id" value="<?php echo $image_name;?>">
                            <span><button type="submit"><img width="25px" height="25px" src="like.jpg" alt=""></button></span>
                            <label for=""><?php echo $p;?></label>
                            </form>
                            <span><form style="width:300px;margin-left:20%;margin-top:-10%;" action="ch.php" method="post">
                            <input type="hidden" name="id1" value="<?php echo $ck;?>">
                            <input type="hidden" name="id" value="<?php echo $image_name;?>">
                            <span><input name="bxi" id="" style="margin-left:15%;" type="text" placeholder="Say what you are thinking"></span>
                            <span><button style="background-color:#EEEEEE" type="submit" name="submit">Post</button></span>
                            </form>
                            </span>
                            <p style="margin-top:2%;">Comments:</p>
                            <?php
                             $conn=mysqli_connect($host,$username,$password,$dbname);
                             $rows=mysqli_query($conn,"SELECT * from comments where file='$image_name'");
                            while($row=mysqli_fetch_array($rows))
                            {
                               
                                $sol=$row["cmt"];
                            ?>
                            <h4 style="margin:0%;margin-left:10%;"><b><?php echo $row["name"];?></b></h4>
                            <span><label style="margin-left:16%;" for=""><?php echo $sol;?></label></span>
                            <?php
                            }
                            ?>
                        </div>
                            <?php
                    }
                            
                }
                    else{
                        die("Connection failed".mysqli_connect_error());
                     }?>
                    </div>
            </div>
        </div>
    </div>
    <div class="footer"> 
        <form action="chat.php" method="post">
    <button id="value1" name="submit1"><img id="value1" src="chatii.png" alt=""></button>
    </form>
    </div>
</body>
</html>