<?php
session_start();
$uid=$_SESSION['uid'];
$con=odbc_connect("database","system","system");
$alter="ALTER SESSION SET current_schema=library";
odbc_exec($con,$alter);
$date=date("d-M-Y");
$d=strtotime("+2 Weeks");
$dor= date("d-M-Y", $d) ;
if(!empty($_POST['book']))
         {
        foreach($_POST['book'] as $data)
             {
                $q="UPDATE issued_books SET doi='$date' WHERE userid='$uid' AND isbn='$data'";
				odbc_exec($con,$q);
				$q1="UPDATE issued_books SET dor='$dor' WHERE userid='$uid' AND isbn='$data'";
				odbc_exec($con,$q1);
				echo $data."has been renewed successfully!\n";
             }
         }
		 echo"<br>";
		 echo"New return date is".$date;
		 echo "</br><a href='home.php' target='frame3'>See Issued Books</a>";
odbc_close($con);
?>