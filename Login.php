<?php 
include "./dbcon/dbcon.php";

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
if(!empty($username) && !empty($email) && !empty($password)){
   $qry=mysqli_query($dbcon,"SELECT * FROM user WHERE username='$username' AND email='$email'");
   if($qry){
   	  if(mysqli_num_rows($qry) > 0){
   	  	 $arr=mysqli_fetch_assoc($qry);
   	  	 if($password == $arr["password"]){
   	  	 	session_start();
            $_SESSION["uid"]=$arr["userid"];
            $_SESSION["username"]=$arr["username"];
            header("location:./home.php");
   	  	 }else{
   	  	 	header("location:./index.php?message=password Not Matched");
   	  	 }
   	  }else{
   	  	header("location:./index.php?message=username | email is Invalid");
   	  }
   }
}
 ?>
