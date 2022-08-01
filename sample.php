<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('connect.php');
    $n="hellos";
    $sql="INSERT INTO tttt VALUES('$n',curdate())";
    $result=mysqli_query($conn,$sql);
    $sql="SELECT WEEK(curdate())-WEEK('2022-07-01') AS w";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    echo "{$row['w']}";
    ?>
</body>
</html>