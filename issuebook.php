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
echo"<body topmargin='20'>";
echo"<center>";
echo"<h1>Select the books</h1>";
//echo $uid."</br>";
$con = odbc_connect("database","system","system");

$a="ALTER SESSION SET current_schema = library";
$r2=odbc_exec($con,$a);
$i=1;
$flag=0;
$check="select count(*) from issued_books where userid= '$uid'";
$exec=odbc_exec($con,$check);
$count=odbc_result($exec,1);
$typecheck="select type from users where userid='$uid'";
$exec1=odbc_exec($con,$typecheck);
$type=odbc_result($exec1,1);
//echo $count." ".$type;
$more=0;
$incr=0;
if($type=="student")
{ if($count<4)
  {$flag=1;
   echo "You can issue ".(4-$count)." more books</br>";
   $more=(4-$count);
   }
   else
   echo"You cannot issue more books";
   }
   else
   {if($count<5)
  {$flag=1;
   echo "You can issue ".(5-$count)." more books</br>";
   $more=(5-$count);
   }
   else
   echo"You cannot issue more books";
   }
$_SESSION["more"]=$more;
if($flag==1)
{
$q1="select * from books";
$r1=odbc_exec($con,$q1);


echo "<form method='post' action='issueinsert.php'>";
echo "<table id='customers'> <tr><th>Select</th><th>ISBN</th><th>Title</th><th>Author</th><th>Type</th><th>Year</th></tr>";
while(odbc_fetch_row($r1))
{
if($i%2==0)
{
 echo "<tr>";
 
 $isbn=odbc_result($r1,'isbn');
 $title=odbc_result($r1,'title');
  $author=odbc_result($r1,'author');
  $type=odbc_result($r1,'type');
  $year=odbc_result($r1,'year');
  echo "<td><input type='checkbox' name='book[]' value='".$isbn."'/></td>";
 echo "<td>".$isbn."</td><td>".$title."</td><td>".$author."</td><td>".$type."</td><td>".$year."</td></tr>";
 }
 else
 { echo "<tr class='alt'>";
 
 $isbn=odbc_result($r1,'isbn');
 $title=odbc_result($r1,'title');
  $author=odbc_result($r1,'author');
  $type=odbc_result($r1,'type');
  $year=odbc_result($r1,'year');
  echo "<td><input type='checkbox' name='book[]' value='".$isbn."'/></td>";
 echo "<td>".$isbn."</td><td>".$title."</td><td>".$author."</td><td>".$type."</td><td>".$year."</td></tr>";
 }
 $i++;
}
echo "</table>";
echo "</br></br><input type='submit'/></form>";
}
odbc_close($con);
?>