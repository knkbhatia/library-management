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
$con = odbc_connect("database","system","system");

$a="ALTER SESSION SET current_schema = library";
$r2=odbc_exec($con,$a);
$i=1;
$q="select isbn from frequency where freq=(select max(freq) from frequency)";
 $r1=odbc_exec($con,$q);
 $isbn=odbc_result($r1,1);
 $r="select * from books where isbn=$isbn";
 $result=odbc_exec($con,$r);
 echo "<table id='customers'> <tr><th>ISBN</th><th>Title</th><th>Author</th><th>Type</th><th>Year</th><th>Anoc</th></tr>";
 while(odbc_fetch_row($result))
{
if($i%2==0)
{
echo "<tr>";
$isbn=odbc_result($result,"isbn");
$title=odbc_result($result,"title");
$author=odbc_result($result,"author");
$type=odbc_result($result,"type");
$year=odbc_result($result,"year");
$anoc=odbc_result($result,"anoc");
echo "<td>".$isbn."</td><td>".$title."</td><td>".$author."</td><td>".$type."</td><td>".$year."</td><td>".$anoc."</td></tr>";
}
else
{
echo "<tr class='alt'>";
 
$isbn=odbc_result($result,"isbn");
$title=odbc_result($result,"title");
$author=odbc_result($result,"author");
$type=odbc_result($result,"type");
$year=odbc_result($result,"year");
$anoc=odbc_result($result,"anoc");
echo "<td>".$isbn."</td><td>".$title."</td><td>".$author."</td><td>".$type."</td><td>".$year."</td><td>".$anoc."</td></tr>";
}
$i++;
 }
echo "</table>";
odbc_close($con);

?>