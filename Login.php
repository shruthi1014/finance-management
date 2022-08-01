<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            background-image: url("background.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
            margin-top: 150px;
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
    </style>
</head>
<body>
    <?php
    include('connect.php');
    $username=(isset($_POST['user'])?$_POST['user']:'');
    $pass=(isset($_POST['pass'])?$_POST['pass']:'');
    $sql="SELECT username,pass FROM members WHERE username='$username' AND pass='$pass'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $_SESSION['USER']=$username;
        header('Location: /finance/inter.html');
        exit;
    }
    else{
            echo "<center><h1>Unsuccessful Login</h1></center>";
            echo "<div align='center'>
                    <form action='Login.html' method='POST'>
                    <button type='submit' class='btn'>Try logging in again</button>
                    </form>
                    <form action='register.html' method='POST'>
                    <button type='submit' class='btn'>Register</button>
                    </form>
                    </div>";
        }
    ?>
    </body>
</html>