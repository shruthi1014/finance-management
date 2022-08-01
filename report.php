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
    <title>Report</title>
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
    <?php
    include('connect.php');
    $U=$_SESSION['USER'];
    echo "<h1>Total Expense Report</h1>";
    $sql="SELECT sum(vegetables),sum(fruits),sum(flowers),sum(grocery),sum(milk),sum(medicines),sum(petrol),sum(snacks),sum(milkcard),sum(general) FROM expenses WHERE username='$U' AND month(dateofupdate)=month(curdate())";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        echo "Vegetables: {$row['sum(vegetables)']}<br><br>".
             "Fruits: {$row['sum(fruits)']}<br><br>".
             "Flowers: {$row['sum(flowers)']}<br><br>".
             "Grocery: {$row['sum(grocery)']}<br><br>".
             "Milk: {$row['sum(milk)']}<br><br>".
             "Medicines: {$row['sum(medicines)']}<br><br>".
             "Petrol: {$row['sum(petrol)']}<br><br>".
             "Snacks: {$row['sum(snacks)']}<br><br>".
             "Milkcard: {$row['sum(milkcard)']}<br><br>".
             "General: {$row['sum(general)']}<br><br>";
    }
    else
    {
        echo "No expense till now<br><br>";
    }
    $sql="SELECT * FROM defaultamount WHERE username='$U' AND item='flower'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    $dflower=0;
    if($count==1)
    {
        $dflower=$row['damount'];
    }
    $sql="SELECT * FROM defaultamount WHERE username='$U' AND item='electricity'";
    $delectricity=0;
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $delectricity=$row['damount'];
    }
    $sql="SELECT * FROM defaultamount WHERE username='$U' AND item='Water'";
    $dwater=0;
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $dwater=$row['damount'];
    }
    $sql="SELECT * FROM defaultamount WHERE username='$U' AND item='Grocery'";
    $dgrocery=0;
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $dgrocery=$row['damount'];
    }
    $sql="SELECT * FROM defaultamount WHERE username='$U' AND item='Wifi'";
    $dwifi=0;
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $dwifi=$row['damount'];
    }
    $sql="SELECT * FROM defaultamount WHERE username='$U' AND item='transport'";
    $dtransport=0;
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $dtransport=$row['damount'];
    }
    $sql="SELECT * FROM defaultamount WHERE username='$U' AND item='recharge'";
    $drecharge=0;
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $drecharge=$row['damount'];
    }
    echo "Default expenses of the month<br><br>";
    echo "Flowers: ".$dflower."<br><br>";
    echo "Electricity: ".$delectricity."<br><br>";
    echo "Water: ".$dwater."<br><br>";
    echo "Grocery: ".$dgrocery."<br><br>";
    echo "Wi-fi: ".$dwifi."<br><br>";
    echo "Transport: ".$dtransport."<br><br>";
    echo "Recharge: ".$drecharge."<br><br>";

    $sql="SELECT * FROM expenses WHERE username='$U' AND month(dateofupdate)=month(curdate()) AND (WEEK(dateofupdate)-WEEK('2022-07-01'))=1";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        echo "Vegetables: {$row['vegetables']}<br><br>".
             "Fruits: {$row['fruits']}<br><br>".
             "Flowers: {$row['flowers']}<br><br>".
             "Grocery: {$row['grocery']}<br><br>".
             "Milk: {$row['milk']}<br><br>".
             "Medicines: {$row['medicines']}<br><br>".
             "Petrol: {$row['petrol']}<br><br>".
             "Snacks: {$row['snacks']}<br><br>".
             "Milkcard: {$row['milkcard']}<br><br>".
             "General: {$row['general']}<br><br>";
    }
    else{
        echo "No expense in week 1<br><br>";
    }

    $sql="SELECT * FROM expenses WHERE username='$U' AND month(dateofupdate)=month(curdate()) AND (WEEK(dateofupdate)-WEEK('2022-07-01')=2)";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        echo "Vegetables: {$row['vegetables']}<br><br>".
             "Fruits: {$row['fruits']}<br><br>".
             "Flowers: {$row['flowers']}<br><br>".
             "Grocery: {$row['grocery']}<br><br>".
             "Milk: {$row['milk']}<br><br>".
             "Medicines: {$row['medicines']}<br><br>".
             "Petrol: {$row['petrol']}<br><br>".
             "Snacks: {$row['snacks']}<br><br>".
             "Milkcard: {$row['milkcard']}<br><br>".
             "General: {$row['general']}<br><br>";
    }
    else{
        echo "No expense in week 2<br><br>";
    }

    $sql="SELECT * FROM expenses WHERE username='$U' AND month(dateofupdate)=month(curdate()) AND (WEEK(dateofupdate)-WEEK('2022-07-01')=3)";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        echo "Vegetables: {$row['vegetables']}<br><br>".
             "Fruits: {$row['fruits']}<br><br>".
             "Flowers: {$row['flowers']}<br><br>".
             "Grocery: {$row['grocery']}<br><br>".
             "Milk: {$row['milk']}<br><br>".
             "Medicines: {$row['medicines']}<br><br>".
             "Petrol: {$row['petrol']}<br><br>".
             "Snacks: {$row['snacks']}<br><br>".
             "Milkcard: {$row['milkcard']}<br><br>".
             "General: {$row['general']}<br><br>";
    }
    else{
        echo "No expense in week 3<br><br>";
    }

    $sql="SELECT * FROM expenses WHERE username='$U' AND month(dateofupdate)=month(curdate()) AND (WEEK(dateofupdate)-WEEK('2022-07-01')=4)";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        echo "Vegetables: {$row['vegetables']}<br><br>".
             "Fruits: {$row['fruits']}<br><br>".
             "Flowers: {$row['flowers']}<br><br>".
             "Grocery: {$row['grocery']}<br><br>".
             "Milk: {$row['milk']}<br><br>".
             "Medicines: {$row['medicines']}<br><br>".
             "Petrol: {$row['petrol']}<br><br>".
             "Snacks: {$row['snacks']}<br><br>".
             "Milkcard: {$row['milkcard']}<br><br>".
             "General: {$row['general']}<br><br>";
    }
    else{
        echo "No expense in week 4<br><br>";
    }
    ?>
</body>
</html>