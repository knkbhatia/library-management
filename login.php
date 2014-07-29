<?php
session_start();
$_SESSION['uid']=$_POST['txtUserId'];
$con = odbc_connect("database","system","system");


$a="ALTER SESSION SET current_schema = library";
$r2=odbc_exec($con,$a);

if(isset($_POST['txtUserId']))
 $username=$_POST['txtUserId'];

 if(isset($_POST['txtPwd']))
$password=$_POST['txtPwd'];

$q1="select password from users where userid='".$username."'";
$r1=odbc_exec($con,$q1);
$b1=odbc_result($r1,1);
 if($b1==$password)
 {header('Location:secondpage.html');
 }
 else
 echo "Invalid password"; 
odbc_close($con);
?>