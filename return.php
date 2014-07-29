<html>
<head>
<title>List of Books</title>
<style>
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:80%;
border-collapse:collapse;
}
#customers td, #customers th 
{
font-size:1.2em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#customers th 
{
font-size:1.4em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#A7C942;
color:#fff;
}
#customers tr.alt td 
{
color:#000;
background-color:#EAF2D3;
}
h2{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;font-size:1.4em;}
</style>
</head>
<?php
session_start();
$uid= $_SESSION['uid'];
//echo $uid."</br>";
$con = odbc_connect("database","system","system");
echo"<body topmargin='20'>";
echo"<center>";
echo"<h1>Select the books to return</h1>";
$a="ALTER SESSION SET current_schema = library";
$r2=odbc_exec($con,$a);
$i=1;

$q1="select * from issued_books where userid='".$uid."'";
$r1=odbc_exec($con,$q1);
echo "<form method='post' action='returnbooks.php'>";
echo "<table id='customers'> <tr><th>Select</th><th>ISID</th><th>ISBN</th><th>DOI</th></tr>";
while(odbc_fetch_row($r1))
{
if($i%2==0)
{
 echo "<tr>";
 
 $isid=odbc_result($r1,'isid');
 $isbn=odbc_result($r1,'isbn');
  $doi=odbc_result($r1,'doi');
  echo "<td><input type='checkbox' name='book[]' value='".$isbn."'/></td>";
 echo "<td>".$isid."</td><td>".$isbn."</td><td>".$doi."</td></tr>";
 }
 else
 {
  echo "<tr class='alt'>";
 
 $isid=odbc_result($r1,'isid');
 $isbn=odbc_result($r1,'isbn');
  $doi=odbc_result($r1,'doi');
  echo "<td><input type='checkbox' name='book[]' value='".$isbn."'/></td>";
 echo "<td>".$isid."</td><td>".$isbn."</td><td>".$doi."</td></tr>";
 }
 
}
echo "</table>";
echo "</br></br><input type='submit'/></form>";
odbc_close($con);
?>