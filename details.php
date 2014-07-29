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
$uid=$_SESSION['uid'];
$con=odbc_connect("database","system","system");
$alter="ALTER SESSION SET current_schema=library";
odbc_exec($con,$alter);
$i=1;
$q="SELECT a.userid,a.isbn,b.title,b.author,a.doi,a.dor FROM issued_books a,books b WHERE a.isbn=b.isbn AND a.userid='$uid'";
$result=odbc_exec($con,$q);
echo"<table id='customers'>";
echo"<tr>";
echo"<th>Userid</th><th>ISBN</th><th>Title</th><th>Author</th><th>Issue Date</th><th>Return Date</th></tr>";
while(odbc_fetch_row($result))
{
$id=odbc_result($result,"userid");
$isbn=odbc_result($result,"isbn");
$title=odbc_result($result,"title");
$author=odbc_result($result,"author");
$dor=odbc_result($result,"doi");
$doi=odbc_result($result,"dor");
if($i%2==0)
{
echo"<tr>";
echo"<td>".$id."</td><td>".$isbn."</td><td>".$title."</td><td>".$author."</td><td>".$doi."</td><td>".$dor."</td></tr>";
}
else
{
echo"<tr class='alt'>";
echo"<td>".$id."</td><td>".$isbn."</td><td>".$title."</td><td>".$author."</td><td>".$doi."</td><td>".$dor."</td></tr>";
}
$i++;
}
echo"</table>";
odbc_close($con);

?>