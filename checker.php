<?php 
require_once("config/connection.php");
// checking if username exit
if(!empty($_POST["username"])) {
$username= $_POST["username"];
$sql ="SELECT UserName FROM  userdata WHERE UserName=:username";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Username already exists.</span>";
} else{	
echo "<span style='color:green'> Username available for Registration.</span>";
}
}

// checking if email exit
if(!empty($_POST["email"])) {
$email= $_POST["email"];
$sql ="SELECT email FROM  userdata WHERE email=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'>Email already exists.</span>";
} else{	
echo "<span style='color:green'>Email available for Registration.</span>";
}
}

?>
