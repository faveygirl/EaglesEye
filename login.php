<?php
  session_start();

include('config/connection.php');
error_reporting(0);

  if(isset($_POST['login']))
  {

//Genrating random number for password encryption
if(@$_SESSION['randnmbr']==""){
   
        $Alpha22=range("A","Z");
        $Alpha12=range("A","Z"); 
        $alpha22=range("a","z");
        $alpha12=range("a","z");
        $num22=range(1000,9999);
        $num12=range(1000,9999);
        $numU22=range(99999,10000);
        $numU12=range(99999,10000);
        $AlphaB22=array_rand($Alpha22);
        $AlphaB12=array_rand($Alpha12);
        $alphaS22=array_rand($alpha22);
        $alphaS12=array_rand($alpha12);
        $Num22=array_rand($num22);
        $NumU22=array_rand($numU22);
        $Num12=array_rand($num12);
        $NumU12=array_rand($numU12);
        $res22=$Alpha22[$AlphaB22].$num22[$Num22].$Alpha12[$AlphaB12].$numU22[$NumU22].$alpha22[$alphaS22].$num12[$Num12];
        $text22=str_shuffle($res22);
         $_SESSION['randnum']= $text22;
} 

	//user  can loging using username or password
    // Getting username or email and password
    $username=$_POST['username'];
     $password=hash('sha256',$_POST['password']);

     // Hashing with Random Number
     $saltedpasswrd=hash('sha256',$password.$_SESSION['randnum']);
    // getting username or password 
    $sql ="SELECT UserName,email,password FROM userdata WHERE (UserName=:username || email=:username)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
foreach ($results as $result) {
 $fetchpassword=$result->password;
 // hashing for stored password
   $storedpass= hash('sha256',$fetchpassword.$_SESSION['randnum']);
}
//
  $options = [
              'cost' => 12,
              ];
  // hashing password
  $hash= password_hash($saltedpasswrd,PASSWORD_DEFAULT, $options);
  // Verifying Post password againt stored password
   if(password_verify($storedpass,$hash)){


    $_SESSION['user']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  }
else {
    echo "<script>alert('Wrong password');</script>";

}

   }


  else{
    echo "<script>alert('Invalid Details');</script>";
  }
}
?>