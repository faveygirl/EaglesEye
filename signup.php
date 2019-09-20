<?php
//Database Configuration File
include('config/connection.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//Getting Post Values
$fullname=$_POST['name'];  
$username=$_POST['username']; 
$email=$_POST['email']; 
$password=$_POST['password'];
$hasedpassword=hash('sha256',$password);
// validating username and email
$ret="SELECT * FROM userdata where (UserName=:username ||  email=:useremail)";
$queryt = $dbh -> prepare($ret);
$queryt->bindParam(':useremail',$email,PDO::PARAM_STR);
$queryt->bindParam(':username',$username,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
// Query for Insertion
$sql="INSERT INTO userdata(FullName,UserName,email,password) VALUES(:fname,:username,:useremail,:password)";
$query = $dbh->prepare($sql);
// Binding Post Values
$query->bindParam(':fname',$fullname,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':useremail',$email,PDO::PARAM_STR);
$query->bindParam(':password',$hasedpassword,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	  $_SESSION['user']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
$msg="signup  Successfully.. Login to your eagle page";
}
else 
{
$error="Something went wrong.Please try again";
}
}
 else
{
$error="Username or Email already exist. Please try again";
}
}
?>
