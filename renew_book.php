<html>
<head>
<style>
<link rel="stylesheet" type="text/css" href="page2.css">
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
<script>
function writedate()
{
var tm = document.getElementById("time");
tm.innerText=Date();
}
timer = setInterval(writedate,1000);
</script>
</head>
<body>
<form method="post" action="renew.php">
<?php
session_start();
$uid=$_SESSION['uid'];
$con=odbc_connect("database","system","system");
$alter="ALTER SESSION SET current_schema=library";
odbc_exec($con,$alter);
$query="SELECT *FROM issued_books WHERE userid='$uid'";
$row=odbc_exec($con,$query);
$i=0;
echo"<body topmargin='20'>";
echo"<center>";
$m=1;
echo"<h1>Select the books to be renewed</h1>";
echo"<table id='customers'>";
echo"<tr><th>Select</th><th>ISBN</th><th>Title</th><th>Issue Date</th><th>Return Date</th><th>Pending Fine</th></tr>";
while(odbc_fetch_row($row))
{
$i=$i+1;

$isbn=odbc_result($row,"isbn");
$doi=odbc_result($row,"doi");
$dor=odbc_result($row,"dor");
$q="SELECT title FROM books WHERE isbn=$isbn";
$exec=odbc_exec($con,$q);
$title=odbc_result($exec,1);
$x=date("d-M-Y");
$datetime1 = strtotime($doi);
$datetime2 = strtotime($x);

$secs = $datetime2 - $datetime1;// == <seconds between the two times>
$days = $secs / 86400;
if($days>=15)
$fine=$days*2;
else
$fine=0;
if($m%2==0)
{

echo"<tr>";
echo"<td><input type='checkbox' name='book[]' value='$isbn'></td>";
echo"<td>".$isbn."</td>";
echo"<td>".$title."</td>";
echo"<td>".$doi."</td>";
echo"<td>".$dor."</td>";
echo"<td>".$fine."</td>";
echo"</tr>";
}
else
{
echo"<tr class='alt'>";
echo"<td><input type='checkbox' name='book[]' value='$isbn'></td>";
echo"<td>".$isbn."</td>";
echo"<td>".$title."</td>";
echo"<td>".$doi."</td>";
echo"<td>".$dor."</td>";
echo"<td>".$fine."</td>";
echo"</tr>";
}
$m++;
}
echo"</table>";
if($i==0)
echo"<p style=color:'red'>You do not have any issued books!<p>";
odbc_close($con);
?>
<br><br>
<input type="submit" onclick="renew.php">
<input type="reset">
</form>
<p id="m" style="color:red"></p>
<br><br><br><br><br><br><br><br><br><br>
<p id="time" style="text-align:right"></p>
</body>
</html>