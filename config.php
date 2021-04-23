
<?php 
$dblocation="localhost"; 
$dbname="bd3";
$dbuser="root";
$dbpasswd="root";
$dbcnx = mysqli_connect($dblocation, $dbuser, $dbpasswd); 

if(!$dbcnx) { 
	exit("<p>В настоящий момент база недоступна</p>"); }
 else {
 	
 }
 if(!mysqli_select_db($dbcnx,$dbname)) 
 	{ exit("<p>В настоящий момент коректное отображение невозможно</p>"); }  

mysqli_set_charset($dbcnx, "utf8"); 
?>