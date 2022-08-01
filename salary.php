<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Amount updation</title>
</head>
<body>
    <?php
    include('connect.php');
    $U=$_SESSION['USER'];
    $amount=(isset($_POST['salary'])?$_POST['salary']:0);
    $sql="SELECT username FROM salary WHERE username='$U'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1){
        $sql="UPDATE salary SET amount=amount+'$amount' WHERE username='$U'";
        if(mysqli_query($conn,$sql)){
            header('LOCATION: /finance/home.html');
            exit;
        }
    }
    else{
        $sql="INSERT INTO salary VALUES('$U','$amount')";
        if(mysqli_query($conn,$sql)){
            header('LOCATION: /finance/home.html');
            exit;
        }
    }
    ?>
</body>
</html>