<?php
$host="localhost";
$user="root";
$password="";
$db="finance";
$conn=mysqli_connect($host,$user,$password,$db);
if($conn)
{
    echo "connected successfully";
    $income=(isset($_POST['income'])?$_POST['income']:'');
    echo "hello $income";
    $sql="INSERT INTO Salary VALUES('$income')";
    if(mysqli_query($conn,$sql))
    {
        echo "inserted successfully";
    }
    else
    {
        echo "salary not inserted";
    }
}
else{
    echo "not connected";
}
?>