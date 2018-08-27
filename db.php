<?php 

$dsn = "mysql:host=localhost;dbname=capstone;port=3336";
$userName = "MattRossi";
$pWord = "SE266";

try{
	
	$db = new PDO($dsn, $userName, $pWord);	
	
} catch(PDOException $e){
	
	die("Cannot Connect to the Database: " . $e);	
}

?>