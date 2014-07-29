<?php
session_start();
$uid=$_SESSION["uid"];
$con = odbc_connect("database","system","system");

$a="ALTER SESSION SET current_schema = library";
$r2=odbc_exec($con,$a);
foreach ($_POST['book'] as $book) {
     //echo "You selected: $book <br>";
	 $isbn="delete from issued_books where isbn=".$book."AND userid='$uid'";
	 $r1=odbc_exec($con,$isbn);
	 echo "Book with isbn: ".$book." returned successfully! </br>";
 }
echo "<a href='home.php' target='frame3'>See Issued Books</a>";
odbc_close($con);
?>