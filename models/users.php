<?php
session_start(); 
include("db.php");
if($_POST['user']){
	$user = $_POST['user'];
	var_dump($user);
	updateUser($user['fName'], $user['lName'],$user['birthday'],$user['email'],$user['userId']);
}

if($_POST['pw']){
	$pass= $_POST['pw'];
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$id = $_POST['id'];
	changePassword($hash, $id);
}

function changePassword($pass, $userId){
	global $db;
	$sql = "UPDATE users SET PW = :pw WHERE UserID = :userId";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':pw', $pass);
	$stmt->execute();	
}

function deleteUserById($userId){
	global $db;
	$sql = "DELETE FROM users WHERE UserID = :userId";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();	
}

function updateUser($fName,$lName,$birthday,$email, $userId){
	global $db;
	$sql = "UPDATE users SET FName = :fName, LName = :lName, Email = :email, Birthday = :birthday WHERE UserID = :userId ";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':fName', $fName);
	$stmt->bindParam(':lName', $lName);
	$stmt->bindParam(':birthday', $birthday);
	$stmt->execute();	


}


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
	$sql = "INSERT INTO users (userID,FName, LName, Email, PW, TemplateID, Birthday) VALUES (NULL, :fName, :lName, :email, :pass,0,:birthday)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':pass', $password);
	$stmt->bindParam(':fName', $fName);
	$stmt->bindParam(':lName', $lName);
	$stmt->bindParam(':birthday', $birthday);
	$stmt->execute();		
}

function getAllUsers(){
	global $db;
	$sql = "SELECT * from users";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results;
}

function getAdminStatus($userId){
	global $db;

	$sql = "SELECT isAdmin from users WHERE UserID = :userId";;
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();
	$results = $stmt->fetchAll();
	var_dump("hey" . $userId);
	return $results[0]["isAdmin"];
	
	
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

function grabUserId($email){
	global $db;
	$sql = "SELECT UserID from users WHERE email = :email";;
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results[0]["UserID"];
	
	
}

function grabTemplateId($email){
	global $db;
	$sql = "SELECT TemplateID from users WHERE email = :email";;
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results[0]["TemplateID"];
	
	
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

function getUserData($id){
	global $db;
	$sql = "SELECT * from users WHERE UserID = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;	
}

function changeUserTemplate($userId, $templateId){
    global $db;
	$sql = "UPDATE users SET TemplateID = :templateId WHERE UserID = :userId";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':templateId', $templateId);
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();
}

?>