<?php
session_start();
?>
<html>
<link rel="stylesheet" type="text/css" href="styles.css">
    <title>Home</title>
    <body>
    <div align="center">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="Balance.php">Balance</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a>Add expense</a></li>
            <li><a>Tips</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a>Report</a></li>
        </ul>
    </div>
    <?php
    include('connect.php');
    $U=$_SESSION['USER'];
    $vegetables=(isset($_POST['vegetables'])?$_POST['vegetables']:0);
    $fruits=(isset($_POST['fruits'])?$_POST['fruits']:0);
    $flowers=(isset($_POST['flowers'])?$_POST['flowers']:0);
    $grocery=(isset($_POST['grocery'])?$_POST['grocery']:0);
    $milk=(isset($_POST['milk'])?$_POST['milk']:0);
    $medicines=(isset($_POST['medicines'])?$_POST['medicines']:0);
    $petrol=(isset($_POST['petrol'])?$_POST['petrol']:0);
    $snacks=(isset($_POST['snacks'])?$_POST['snacks']:0);
    $milkcard=(isset($_POST['milkcard'])?$_POST['milkcard']:0);
    $general=(isset($_POST['general'])?$_POST['general']:0);
    $sum=$vegetables+$fruits+$flowers+$grocery+$milk+$medicines+$milkcard+$petrol+$snacks+$general;
    $sql="UPDATE salary SET amount=amount-'$sum' WHERE username='$U'";
    if(mysqli_query($conn,$sql))
    {
        $sql="SELECT * FROM expenses WHERE username='$U' AND dateofupdate=curdate()";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==0)
        {
            $sql="INSERT INTO expenses VALUES('$vegetables','$fruits','$flowers','$grocery','$milk','$medicines','$petrol','$snacks','$milkcard','$general',curdate(),'$U')";
            if(mysqli_query($conn,$sql))
            {
                header('Location: /finance/Balance.php');
                exit;
            }
            
        }
        else
        {
            $sql="UPDATE expenses SET vegetables=vegetables+'$vegetables',fruits=fruits+'$fruits',flowers=flowers+'$flowers',grocery=grocery+'$grocery',milk=milk+'$milk',medicines=medicines+'$medicines',petrol=petrol+'$petrol',snacks=snacks+'$snacks',milkcard=milkcard+'$milkcard',general=general+'$general' WHERE username='$U' AND dateofupdate=curdate()";
            if(mysqli_query($conn,$sql))
            {
                header('Location: /finance/Balance.php');
                exit;
            }
        }
        
    }
    ?>
    </body>
</html>