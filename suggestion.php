<?php
$book=$_POST['book'];
$author=$_POST['author'];
$type=$_POST['type'];
$year=$_POST['year'];

$con=odbc_connect("database","system","system"); 
$alter="ALTER SESSION SET current_schema=library";
odbc_exec($con,$alter);


/*$result=odbc_exec($con,"SELECT * FROM books WHERE title='$book'");
$i=0;
while(odbc_fetch_row($result));
{
$i=$i+1;
}
if($i!=0)
{
echo"<p style='color:red'>The book is already there in library.</p>";
}
else
{ */
$q="SELECT max(sid) FROM suggest";
$exec=odbc_exec($con,$q);
$max=odbc_result($exec,1);

$max=$max+1;
//echo $max;
odbc_exec($con,"INSERT INTO suggest VALUES($max,'$book','$author','$type','$year')");

$q="SELECT count(*) FROM suggest WHERE title='$book'";
$exec1=odbc_exec($con,$q);
$count=odbc_result($exec1,1);
if($count>5)
{
$q="SELECT max(isbn) FROM books";
$exec2=odbc_exec($con,$q);
$max=odbc_result($exec2,1);
$max=$max+1;
odbc_exec($con,"INSERT INTO books VALUES($max,'$book','$author','$type','$year',20)");
echo"<p style='color:red'>Thank you for your suggestion<br></p>";
echo $book." has been added to library";
}
else
echo"<p style='color:red'>Thank you for your suggestion<br></p>";

odbc_close($con);
?>

