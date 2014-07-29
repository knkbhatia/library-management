<?php
$con=odbc_connect("database","system","system");
$alter="ALTER SESSION SET current_schema=library";
odbc_exec($con,$alter);
$uid=$_POST['name'];
$old=$_POST['old'];
$new=$_POST['new'];


$exec=odbc_exec($con,"SELECT password FROM users WHERE userid='$uid'");
$pass=odbc_result($exec,1);
if($old!=$pass)
{
echo"Passwords do not match!\n";
}
else
{
odbc_exec($con,"UPDATE users SET password='$new' WHERE userid='$uid'");
echo"<p style:color='red'>Password updated successfully<br></p>";

}
odbc_close($con);
?>
