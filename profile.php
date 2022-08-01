<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Profile</title>
    <style>
        h2{
            color: red;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <div align="center">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a>Balance</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a>Add expense</a></li>
            <li><a>Tips</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a>Report</a></li>
            <li style="float:right"><a>Name</a></li>
        </ul>
    </div>
    <div align="center">
        <h1>Profile</h1>
        <?php
        include('connect.php');
        $U=$_SESSION['USER'];
        $sql="SELECT * FROM members WHERE username='$U'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            echo "<br> <h2>Username: {$row['username']}</h2> <br>".
                 "<br> <h2>Gender: {$row['gender']}</h2> <br>".
                 "<br> <h2>Phone number: {$row['phonenumber']}</h2> <br>".
                 "<br> <h2>Email: {$row['email']}</h2> <br>";
        }
        ?>
    </div>
    
</body>
</html>