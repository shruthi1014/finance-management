<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance Amount</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        h2{
            font-weight:bolder;
            color: darkviolet;
        }
    </style>
</head>
<body>
    <div align="center">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="Balance.php">Balance</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a>Add expense</a></li>
            <li><a>Tips</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="report.php">Report</a></li>
        </ul>
    </div>
    <div align="center">
        <?php
        include('connect.php');
        $U=$_SESSION['USER'];
        $sql="SELECT amount FROM salary WHERE username='$U'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            echo "<h2>BALANCE: {$row['amount']}</h2>";
            echo "<form action='Salary.html' method='POST'>
                    <input type='submit' class='btn' value='Do you want to update amount?'>
                    </form>";
        }
        ?>
</body>
</html>