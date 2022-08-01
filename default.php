<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default</title>
    <style>
    body{
            background-image: url("background.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
    h1{
            margin-top: 80px;
            color: black;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bolder;
            font-size: 50px;
        }
    h2{
            color: black;
            font-weight: bolder;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
    .btn{
            background-color: rgb(255, 241, 47);
            font-size: 30px;
            border: 10px;
            border-radius: 8px;
        }
    .btn:hover{
            background-color: rgb(245, 126, 28);
        }
    .reg{
            background-color: rgb(255, 241, 47);
            font-size: 20px;
            border-radius: 8px;
            position: absolute;
            top: 30px;
            right: 20px;
        }
    .reg:hover{
            background-color: rgb(245, 126, 28);
        }
    .required:after{
            content: " *";
            color:red;
        }
    </style>
</head>
<body>
    <div align="center">
    <?php
    include('connect.php');
    $U=$_SESSION['USER'];
    $item=(isset($_POST['item'])?$_POST['item']:"");
    $damount=(isset($_POST['damount'])?$_POST['damount']:"");
    $sql="SELECT * FROM defaultamount WHERE username='$U' AND item='$item'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $sql="UPDATE defaultamount SET damount='$damount' WHERE username='$U' AND item='$item'";
    }
    else
    {
        $sql="INSERT INTO defaultamount VALUES('$U','$item','$damount')";
    }
    if(mysqli_query($conn,$sql))
    {
        echo "<form action='default.html' method='POST'>
                <input type='submit' class='btn' value='Click to add more default items'>
                </form><br><br>
                <form action='home.html' method='POST'>
                <input type='submit' class='btn' value='Home'>
                </form>";
    }
    ?>
    </div>
</body>
</html>