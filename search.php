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
$search=$_POST['search'];
$q="SELECT * FROM books WHERE title='$search'";
$result=odbc_exec($con,$q);
$i=0;
$m=1;
echo"<table id='customers'>";
echo"<h1>Book Details for the book: ".$search."</h1>\n";
echo"<tr color='brown'><th>ISBN</th><th>Title</th><th>Author</th><th>Type</th><th>Year</th><th>Available Copies</th></tr>";
while(odbc_fetch_row($result))
{
$i=$i+1;

$isbn=odbc_result($result,"isbn");
$title=odbc_result($result,"title");
$author=odbc_result($result,"author");
$type=odbc_result($result,"type");
$year=odbc_result($result,"year");
$anoc=odbc_result($result,"anoc");
if($m%2==0)
{
echo"<tr>";
echo"<td>".$isbn."</td>";
echo"<td>".$title."</td>";
echo"<td>".$author."</td>";
echo"<td>".$type."</td>";
echo"<td>".$year."</td>";
echo"<td>".$anoc."</td>";
echo"</tr>";
}
else
{echo"<tr class='alt'>";
echo"<td>".$isbn."</td>";
echo"<td>".$title."</td>";
echo"<td>".$author."</td>";
echo"<td>".$type."</td>";
echo"<td>".$year."</td>";
echo"<td>".$anoc."</td>";
echo"</tr>";

}
$m++;

}

$j=0;

if($i==0)
{
$q="SELECT * FROM books WHERE author='$search'";
$result=odbc_exec($con,$q);
while(odbc_fetch_row($result))
{
$j=$j+1;

$isbn=odbc_result($result,"isbn");
$title=odbc_result($result,"title");
$author=odbc_result($result,"author");
$type=odbc_result($result,"type");
$year=odbc_result($result,"year");
$anoc=odbc_result($result,"anoc");

if($m%2==0)
{
echo"<tr>";
echo"<td>".$isbn."</td>";
echo"<td>".$title."</td>";
echo"<td>".$author."</td>";
echo"<td>".$type."</td>";
echo"<td>".$year."</td>";
echo"<td>".$anoc."</td>";
echo"</tr>";
}
else
{echo"<tr class='alt'>";
echo"<td>".$isbn."</td>";
echo"<td>".$title."</td>";
echo"<td>".$author."</td>";
echo"<td>".$type."</td>";
echo"<td>".$year."</td>";
echo"<td>".$anoc."</td>";
echo"</tr>";

}
$m++;


}
}
$k=0;
if(($i==0)&&($j==0))
{
$q="SELECT * FROM books WHERE type='$search'";
$result=odbc_exec($con,$q);
while(odbc_fetch_row($result))
{
$k=$k+1;

$isbn=odbc_result($result,"isbn");
$title=odbc_result($result,"title");
$author=odbc_result($result,"author");
$type=odbc_result($result,"type");
$year=odbc_result($result,"year");
$anoc=odbc_result($result,"anoc");

if($m%2==0)
{
echo"<tr>";
echo"<td>".$isbn."</td>";
echo"<td>".$title."</td>";
echo"<td>".$author."</td>";
echo"<td>".$type."</td>";
echo"<td>".$year."</td>";
echo"<td>".$anoc."</td>";
echo"</tr>";
}
else
{echo"<tr class='alt'>";
echo"<td>".$isbn."</td>";
echo"<td>".$title."</td>";
echo"<td>".$author."</td>";
echo"<td>".$type."</td>";
echo"<td>".$year."</td>";
echo"<td>".$anoc."</td>";
echo"</tr>";

}
$m++;


}
}
echo "</table>";
if(($i==0)&&($j==0)&&($k==0))
echo"<p style=color:'red'>\nThe book is not available in library!Add it in suggestion list\n</p>";
echo "<a href='home.php' target='frame3'>See Issued Books</a>";
odbc_close($con);
?>