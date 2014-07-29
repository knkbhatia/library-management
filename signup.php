<?php
session_start();
$_SESSION['uid']=$_POST['uid'];
$con = odbc_connect("database","system","system");
$a="ALTER SESSION SET current_schema = library";
$r2=odbc_exec($con,$a);


if(isset($_POST['uname']))
 $username=$_POST['uname'];
 if(isset($_POST['uid']))
 $uid=$_POST['uid'];
if(isset($_POST['sex']))
 $usex=$_POST['sex'];
if(isset($_POST['email']))
 $email=$_POST['email'];
 if(isset($_POST['type']))
 $utype=(string)$_POST['type'];
 
 if(isset($_POST['password']))
$password=$_POST['password'];
echo $usex;
/* if(strcmp((string)$usex,'Male')==0)
$sex='M';
else
$sex='F';*/
if(strcmp($utype,"teacher")==0)
$maxlimit=5;
else
$maxlimit=4; 
echo $username.$uid.$usex.$email.$utype.$maxlimit;
$q1="insert into users values('$uid','$username','$usex','$email','$utype','$password',$maxlimit)";
$r1=odbc_exec($con,$q1);

if(!$r1)
echo"error";
else
 {header('Location:secondpage.html');
 }

odbc_close($con);
?>