<?php

require "db.php";

function confirm($value, $valueConf){
	if(!is_null($value && !is_null($valueConf))){
	if($value == $valueConf){
		$return = true;
	}
	else{
		$return = false;
	}}

	else{
		$return = false;
	}

	return $return;


}
// model file for users table
function addUser($email, $password, $fName, $lName, $birthday){
	global $db;
	var_dump($email, $password, $fName, $lName, $birthday);
	$sql = "INSERT INTO users (userID,FName, LName, Email, PW, TemplateID, Birthday) VALUES (NULL, :fName, :lName, :email, :pass,0,:birthday)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':pass', $password);
	$stmt->bindParam(':fName', $fName);
	$stmt->bindParam(':lName', $lName);
	$stmt->bindParam(':birthday', $birthday);
	$stmt->execute();		
}


function grabHash($email){
	global $db;
	
	$sql = "SELECT PW from users WHERE email = :email";;
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results[0]["PW"];
	
	
}	

function emailNotExists($email){
	global $db;
	
	$sql = "SELECT * from users WHERE email = :email";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$results = $stmt->fetchAll();
	if($results){
		$return = false;
	}

	else{
		$return = true;
	}

	return $return;
	
}


?>