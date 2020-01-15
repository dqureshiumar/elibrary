<?php  
 //logout.php
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="elibrary";

 //CREATE CONNECTION
 $conn=mysqli_connect($servername,$username,$password,$dbname);
 //CHECK CONNECTION
 if(!$conn){
     die("connection failed:" . mysqli_connect_error());
 }
 mysqli_close($conn);
 session_start();  
 $_SESSION['id'] = 0;
 session_destroy();
 header("location: index.php");  
?>