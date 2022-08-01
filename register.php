<html>
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
    <body>
        <?php
        include('connect.php');
        $username=(isset($_POST['name'])?$_POST['name']:'');
        $gender=(isset($_POST['gender'])?$_POST['gender']:'');
        $phonenumber=(isset($_POST['phonenumber'])?$_POST['phonenumber']:'');
        $email=(isset($_POST['email'])?$_POST['email']:'');
        $password=(isset($_POST['pass'])?$_POST['pass']:'');
        $sql="SELECT username FROM members WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==1)
            {
                echo "<h1> Username already taken</h1>";
                echo "<div align='center'>
                        <form action='register.html' method='POST'>
                        <button type='submit' class='btn'>Try a different username</button>
                        </form>
                        </div>";
            }
            else{
                $sql="INSERT INTO members VALUES('$username','$gender','$phonenumber','$email','$password')";
                if(mysqli_query($conn,$sql))
                {
                    echo "<center><h1>Registeration successfull</h1></center>";
                    echo "<div align='center'>
                        <form action='Login.html' method='POST'>
                        <button type='submit' class='btn'>Login</button>
                        </form>
                        </div>";
                }
            }
        ?>
    </body>
</html>