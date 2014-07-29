<?php
session_start();
$uid=$_SESSION['uid'];
$con=odbc_connect("database","system","system");
$alter="ALTER SESSION SET current_schema=library";
odbc_exec($con,$alter);

echo"Find Books which have been issued maximum number of times\n";
echo"<br><br>";
echo "<a href='max.php' target='frame3'>Find</a>";
//echo"<input type='submit' value='Find!' onsubmit()='max.php'></input>";

echo"<br><br>";
echo"Find books which have been issued minimum number of times\n";
echo"<br><br>";
echo "<a href='min.php' target='frame3'>Find</a>";
//echo"<input type='submit' value='Find!' onclick='min.php'></input>";

echo"<br><br>";
echo"Find all your detail!\n";
echo"<br><br>";

//echo"<input type='submit' value='Find!' onclick='all.php'></input>";
echo "<a href='details.php' target='frame3'>Find</a>";
echo"<br><br>";
odbc_close($con);
?>
