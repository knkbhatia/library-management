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
echo"<body topmargin='20'>";
echo"<center>";
echo"<h2>Book List</h2>";
echo"<table id='customers'>";
echo"<tr>";
echo"<th>Book Name</th>";
echo"<th>Author</th>";
echo"<th>Copies</th>";
echo"</tr>";
$i=1;
$con=odbc_connect("database","system","system");
$a="ALTER SESSION SET current_schema = library";
$r2=odbc_exec($con,$a);
$result=odbc_exec($con,"SELECT * FROM books");
while(odbc_fetch_row($result))
{ 
if($i%2==0)
{
echo"<tr>";
echo"<td>".odbc_result($result,'title')."</td>";
echo"<td>".odbc_result($result,'author')."</td>";
echo"<td>".odbc_result($result,'anoc')."</td>";
echo"</tr>";
}
else
{
echo"<tr class='alt'>";
echo"<td>".odbc_result($result,'title')."</td>";
echo"<td>".odbc_result($result,'author')."</td>";
echo"<td>".odbc_result($result,'anoc')."</td>";
echo"</tr>";
}
$i++;
}
echo"</table>";
?>
