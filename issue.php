<?php
echo"<p style='color:red'>Select the books</p>";
session_start();
$uid=$_SESSION['uid'];
$con=odbc_connect("databse","system","system");
$alter="ALTER SESSION SET current_schema=library";

foreach($_POST['issue'] as $issue)
{
$row=NULL;
$result=odbc_exec("SELECT* FROM books WHERE title='$issue'");
$row=odbc_fetch_rows($result);
if($row=NULL)
{
echo"<p style='color:red'>Please enter a book name to issue.</p>";
}
else
{
$result="SELECT max(isid) from issued_books";
$max=odbc_exec($con,$result);
$max=$max+1;
$result="SELECT max(isbn) from issued_books";
$isbn=odbc_exec($con,$result);
$isbn=$isbn+1;
$doi=date();
$dor=date(
$result="INSERT INTO issued_books VALUES($max,$isbn,

/*if(($book1=="")&&($book2=="")&&($book3==""))
{
echo"<p style='color:red'>Please enter a book name to issue.</p>";
}
else if(($a!="")&&($b!="")&&($c!=""))
{
echo"<p style='color:red'>Please return books before issuing</p>";
}
else
{
echo"<p style='color:red'>Following books have been issued:</p>";
echo"<table border='1' cellpadding='7' cellwidth='0'>";
echo"<tr>";
echo"<th>No</th>";
echo"<th>Name</th>";
echo"<th>Author</th>";
echo"</tr>";
mysql_query("UPDATE books SET Copies=Copies-1 WHERE Name='$book1'");
$result=mysql_query("SELECT* FROM books WHERE Name='$book1'");
$row=mysql_fetch_array($result);
$author=$row['Author'];
echo"<tr><td>1.</td>";
echo"<td>".$book1."</td>";
echo"<td>".$author."</td></tr>"; 
mysql_query("UPDATE books SET Copies=Copies-1 WHERE Name='$book2'");
$result=mysql_query("SELECT* FROM books WHERE Name='$book2'");
$row=mysql_fetch_array($result);
$author=$row['Author'];
echo"<tr><td>2.</td>";
echo"<td>".$book2."</td>";
echo"<td>".$author."</td></tr>"; 
mysql_query("UPDATE books SET Copies=Copies-1 WHERE Name='$book3'");
$result=mysql_query("SELECT* FROM books WHERE Name='$book3'");
$row=mysql_fetch_array($result);
$author=$row['Author'];
echo"<tr><td>3.</td>";
echo"<td>".$book3."</td>"; 
echo"<td>".$author."</td>";
echo"</tr>";
echo"</table>";

mysql_query("UPDATE users SET Book1='$book1' WHERE Name='$name'");
mysql_query("UPDATE users SET Book2='$book2' WHERE Name='$name'");
mysql_query("UPDATE users SET Book3='$book3' WHERE Name='$name'");
$x=date("d");
$y=date("Y-m");
mysql_query("UPDATE users SET Date=$x WHERE Name='$name'");
mysql_query("UPDATE users SET Month-Year=$y WHERE Name='$name'");
mysql_close($con);
}
*/
?>
        
	


