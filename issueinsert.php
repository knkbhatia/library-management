<?php
session_start();
$uid=$_SESSION["uid"];
$more=$_SESSION["more"];
$inc=0;
$con = odbc_connect("database","system","system");

$a="ALTER SESSION SET current_schema = library";
$r2=odbc_exec($con,$a);
//$doi= date("d-m-Y");
$doi= date("d-M-Y");
//echo $doi;
$d=strtotime("+2 Weeks");
$dor= date("d-M-Y", $d) ;
//echo $dor;

$r1="SELECT max(isid) from issued_books";
$r3=odbc_exec($con,$r1);
$isid=odbc_result($r3,1);
$isid= $isid +1;

//echo $isid;
foreach ($_POST['book'] as $book) {
	//echo $isid.$book.$uid.$doi.$dor."</br>";
     //echo "You selected: $book <br>";
	 if($inc<$more)
	 {
	 $q="insert into issued_books values($isid,$book,'$uid','$doi','$dor')";
	 echo "Book with isbn: ".$book." issued successfully! </br>";
	 $r4=odbc_exec($con,$q);
	$isid=$isid+1;
	$inc=$inc+1;
	}
 }
 echo "<a href='home.php' target='frame3'>See Issued Books</a>";
//echo "<input type='submit' target='frame3' onsubmit='home.php' name='See Issued Books'/>";
odbc_close($con);
?>